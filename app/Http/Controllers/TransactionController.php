<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\support\Facades\Auth;

class TransactionController extends Controller
{
    public function viewTransactionByAdmin($id)
    {

        
        $moneyIn = \App\Models\Transaction::where('donation_type_id', $id)->where('tran_type','In')->sum('total_amount');
        $moneyOut = \App\Models\Transaction::where('donation_type_id', $id)->where('tran_type','Out')->sum('total_amount');

        // dd($moneyOut);
        $transaction = Transaction::where('donation_type_id', $id)->get();
        return view('admin.donationtype.alltransaction',compact('transaction','moneyIn','moneyOut'));
    }

    public function getAllTransaction()
    {

        
        $moneyIn = \App\Models\Transaction::where('tran_type','In')->sum('total_amount');
        $moneyOut = \App\Models\Transaction::where('tran_type','Out')->sum('total_amount');

        // dd($moneyOut);
        $transaction = Transaction::orderby('id', 'DESC')->get();
        return view('admin.transaction.alltransaction',compact('transaction','moneyIn','moneyOut'));
    }


    
    

    
    
}
