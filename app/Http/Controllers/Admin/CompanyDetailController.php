<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyDetail;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = CompanyDetail::all()->first();
        // dd($company); exit();
        return view('admin.companydetails.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            $team = new CompanyDetail();
            $team->company_name= $request->company_name;
            $request->validate([
                'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand1 = mt_rand(100000, 999999);
            $company_logoName = time(). $rand1 .'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('images/company'), $company_logoName);
            $team->company_logo= $company_logoName;

            $request->validate([
                'fav_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand2 = mt_rand(100000, 999999);
            $fav_iconName = time(). $rand2 .'.'.$request->fav_icon->extension();
            $request->fav_icon->move(public_path('images/company'), $fav_iconName);

            $team->fav_icon= $fav_iconName;

            $team->address= $request->address;
            $team->address2= $request->address2;
            $team->footer_content= $request->footer_content;
            $team->google_map= $request->google_map;
            $team->opening_time= $request->opening_time;
            $team->phone1= $request->phone1;
            $team->phone2= $request->phone2;
            $team->email1= $request->email1;
            $team->email2= $request->email2;
            $team->facebook= $request->facebook;
            $team->twiter= $request->twiter;
            $team->instagram= $request->instagram;
            $team->linkedin= $request->linkedin;
            $team->website= $request->website;
            $team->footer_link= $request->footer_link;
            $team->google_play_link= $request->google_play_link;
            $team->google_appstore_link= $request->google_appstore_link;
            $team->tawkto= $request->tawkto;
            $team->created_by= Auth::user()->id;
            $team->save();

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Company Information Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);

        }catch (\Exception $e){
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = CompanyDetail::find($id);
       if($request->company_logo != 'null'){
            $logo_image_path = public_path('images/company').'/'.$company->company_logo;
            // unlink($logo_image_path);
            $company->company_name= $request->company_name;
            $request->validate([
                'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $logorand = mt_rand(100000, 999999);
            $companylogoName = time(). $logorand .'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('images/company'), $companylogoName);
            $company->header_logo = $companylogoName;
        }

        if($request->fav_icon != 'null'){
            $icon_path = public_path('images/company').'/'.$company->fav_icon;
            // unlink($icon_path);
            $company->company_name= $request->company_name;
            $request->validate([
                'fav_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $iconrand = mt_rand(100000, 999999);
            $companyiconName = time(). $iconrand .'.'.$request->fav_icon->extension();
            $request->fav_icon->move(public_path('images/company'), $companyiconName);
            $company->fav_icon= $companyiconName;
        }

        $company->company_name= $request->company_name;
        $company->address1= $request->address;
        $company->address2 = $request->address2;
        $company->footer_content = $request->footer_content;
        $company->google_map = $request->google_map;
        $company->opening_time = $request->opening_time;
        $company->phone1= $request->phone1;
        $company->phone2= $request->phone2;
        $company->email1= $request->email1;
        $company->email2= $request->email2;
        $company->facebook= $request->facebook;
        $company->twitter = $request->twiter;
        $company->instagram= $request->instagram;
        $company->linkedin= $request->linkedin;
        $company->website= $request->website;
        $company->footer_link= $request->footer_link;
        $company->google_play_link= $request->google_play_link;
        $company->google_appstore_link= $request->google_appstore_link;
        $company->tawkto= $request->tawkto;

        if ($company->save()) {

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Company Information Updated Successfully.</b></div>";

            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetail  $companyDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetail $companyDetail)
    {
        //
    }
}
