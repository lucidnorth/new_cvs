<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\UserPackage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Import the Log facade

class UserDashboardPackagesController extends Controller
{
    public function index()
    {

        // Fetch the current active package of the authenticated user
        //     $user = auth()->user();
        //     $userId = Auth::id();
        //    $activePackage = $user->activePackage();

        $userId = auth()->id();
        $user = User::find($userId);
        $activePackage = $user->activePackage();
        $packages = Package::all();

        return view('users.UserDashboardPackages', [
            'packages' => $packages,
            'activePackage' => $activePackage
        ]);
    }

    public function purchase(Request $request)
    {
        $package = Package::where('name', $request->package_name)->firstOrFail();

        $user = auth()->user();

        // Create a new UserPackage entry
        $userPackage = UserPackage::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'amount' => $package->amount,
            'searches_left' => 0, // Initially, no searches are added until payment is confirmed
            'payment_status' => 'pending',
        ]);

        $paymentDetails = [
            'email' => $user->email,
            'amount' => $package->amount * 100, // Paystack expects amount in kobo
            'callback_url' => route('payment.callback'),
            'metadata' => [
                'order_id' => $userPackage->id,
                'user_id' => $user->id,
            ],
        ];

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', $paymentDetails);

        if ($response->successful()) {
            $paymentUrl = $response['data']['authorization_url'];
            return redirect($paymentUrl);
        } else {
            return redirect()->route('packages.index')->with('error', 'Failed to initiate payment.');
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        $paymentReference = $request->query('reference');

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get(env('PAYSTACK_PAYMENT_URL') . '/transaction/verify/' . $paymentReference);

        if ($response->successful() && $response['data']['status'] == 'success') {
            // Find the UserPackage by order_id
            $userPackage = UserPackage::findOrFail($response['data']['metadata']['order_id']);

            // Update the    status to 'paid'
            $userPackage->payment_status = 'paid';
            // $userPackage->save();

            // Get the authenticated user
            $user = $userPackage->user;

            // Check if the user has an active package
            $activePackage = $user->activePackage();

            if ($activePackage) {
                // Increment the searches_left of the active package
                $activePackage->increment('searches_left', $userPackage->package->search_limit);
            } else {
                // Set the searches_left for the newly paid package
                $userPackage->searches_left = $userPackage->package->search_limit;
                $userPackage->save();
            }

            // Redirect with success status
            return redirect()->route('packages.index')->with('status', 'Payment successful!');
        } else {
            // Redirect with error status if payment verification fails
            return redirect()->route('packages.index')->with('error', 'Payment verification failed.');
        }
    }
}
