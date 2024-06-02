<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\FundraisingSource;
use App\Models\Campaign;
use App\Models\CampaignShare;
use App\Models\Transaction;
use Illuminate\support\Facades\Auth;

class FundraiserController extends Controller
{
    public function activeCampaign()
    {
        $data = Campaign::where('user_id', Auth::user()->id)->get();
        return view('user.activecampaign', compact('data'));
    }

    public function referralCampaign()
    {

        $data = Campaign::with('campaignshare')->whereHas('campaignshare',function($query){
            $query->where('user_id',Auth::user()->id);
        })
        ->get();

        // $data = Campaign::where('user_id', Auth::user()->id)->get();
        return view('user.refcampaign', compact('data'));
    }

    public function getCampaignReferralLink()
    {
        return view('user.confirm_ref_campaign');
    }

    public function storeCampaignReferralLink(Request $request)
    {
        $input = $request->all();

        $chkcampaign = Campaign::where('id', $request->campaignid)->first();

        if ($chkcampaign->user_id == Auth::user()->id) {
            return redirect()->back()->with('error', 'You create this campaign. Thank you.');
        }
     
        $chkdata = CampaignShare::where('user_id', Auth::user()->id)->first();
        if ($chkdata) {
            return redirect()->back()->with('error', 'Already you added this campaign. Thank you.');
        }

        $data = new CampaignShare();
        $data->user_id = $request->ref_to_id;
        $data->ref_from_id = $request->ref_from_id;
        $data->campaign_id = $request->campaignid;
        
        if ($data->save()) {
            return redirect()->route('user.refcampaign')->with('success', 'Campaign referred successfully.');
        } else {
            return redirect()->back()->with('error', 'Error to save.');
        }
        
    }

    public function fundraiserDonation($id)
    {
        $data = Transaction::where('user_id', $id)->get();
        return view('admin.fundraiser.fundraiserdonation', compact('data','id'));
    }

    public function fundraiserTransaction($id)
    {
        $data = Transaction::where('user_id', $id)->get();
        return view('admin.fundraiser.fundraisertransaction', compact('data','id'));
    }

    

}
