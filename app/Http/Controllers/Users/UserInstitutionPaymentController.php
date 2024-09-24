<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance;
use App\Models\UserPackageInstitution;
use Illuminate\Support\Facades\Log;


class UserInstitutionPaymentController extends Controller
{
    public function Payment()
    {
        $user = auth()->user();
        $institution = $user->my_institution;

        if ($institution) {
            // Fetch payments and calculate total amount
            $payments = Finance::where('institution', $institution->institutions)->get();
            $totalAmount = $payments->sum('amount');

            // Sum up the amount given to the institution for each user package
            $totalAmountGivenToInstitution = UserPackageInstitution::where('institution_id', $institution->id)->sum('amount_given_to_institution');

            // Calculate the amount due
            $amountDue = $totalAmountGivenToInstitution - $totalAmount;

            // Log data for debugging
            Log::info('Payment Data:', [
                'totalAmount' => $totalAmount,
                'totalAmountGivenToInstitution' => $totalAmountGivenToInstitution,
                'amountDue' => $amountDue,
            ]);

            return view('Users.UserDashboardPayment', [
                'payments' => $payments,
                'totalAmount' => $totalAmount,
                'totalAmountGivenToInstitution' => $totalAmountGivenToInstitution,
                'amountDue' => $amountDue,
            ]);
        } else {
            return redirect()->route('user.dashboard')->with('error', 'No institution found.');
        }
    }
}
