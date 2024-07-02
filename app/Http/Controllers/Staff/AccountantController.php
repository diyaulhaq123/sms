<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantController extends Controller
{
    //

    public function viewPayment(Request $request)
    {
        return view('admin.account.payments');
    }

    public function makePayment(Request $request)
    {
        return view('admin.account.make_payment');
    }

    public function paymentAmount(Request $request)
    {
        return view('admin.account.fee_structures');
    }

    public function viewPaymentById(Request $request)
    {
        return view('admin.account.single_payment');
    }

}
