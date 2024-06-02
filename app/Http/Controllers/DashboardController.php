<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventWithdrawReq;

class DashboardController extends Controller
{
    public function withdrawReqRemove(Request $request)
    {
        
        $deactive = EventWithdrawReq::find($request->dataid);
        $deactive->admin_notification = "1";
        $deactive->save();
        $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Withdraw request close Successfully.</b></div>";
        return response()->json(['status'=> 300,'message'=>$message]);
    }
}
