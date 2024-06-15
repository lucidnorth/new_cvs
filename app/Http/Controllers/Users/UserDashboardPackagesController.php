<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Http;

class UserDashboardPackagesController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('users.UserDashboardPackages', ['packages' => $packages]);
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
            $userPackage = UserPackage::findOrFail($response['data']['metadata']['order_id']);
            $userPackage->payment_status = 'paid';

            // Find the active package for the user
            $user = $userPackage->user;
            $activePackage = $user->activePackage();

            if ($activePackage) {
                // If there is an active package, increment the searches_left
                $activePackage->increment('searches_left', $userPackage->package->search_limit);
                $activePackage->save();
            } else {
                // If there is no active package, set searches_left directly
                $userPackage->searches_left = $userPackage->package->search_limit;
                $userPackage->save();
            }

            return redirect()->route('packages.index')->with('status', 'Payment successful!');
        } else {
            return redirect()->route('packages.index')->with('error', 'Payment verification failed.');
        }
    }
}
