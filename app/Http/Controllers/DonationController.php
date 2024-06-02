<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class DonationController extends Controller
{
    public function donationHistory()
    {
        $transaction = Transaction::where('user_id',Auth::user()->id)->orderby('id','DESC')->get();
        // dd($data);
        $moneyIn = \App\Models\Transaction::where('user_id',Auth::user()->id)->where('tran_type','In')->sum('amount');
        return view('user.donationhistory', compact('transaction','moneyIn'));
    }
}
