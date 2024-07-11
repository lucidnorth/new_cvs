<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance ;

class FinanceController extends Controller
{
   

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'institution' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'paymentDate' => 'required|date',
            'paymentStatus' => 'required|string|max:255',
        ]);

        // Create a new finance record
        $finance = new Finance();
        $finance->institution = $request->input('institution');
        $finance->amount = $request->input('amount');
        $finance->payment_date = $request->input('paymentDate');
        $finance->status = $request->input('paymentStatus');
        $finance->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Payment confirmed and saved successfully.');
    }
}
