<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\VolunteerMail;
use App\Models\ContactMail;
use App\Models\Volunteer;
use Mail;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $data = Volunteer::orderby('id','DESC')->get();
        return view('admin.volunteer.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Volunteer();
        $data->volunteerid = time();
        $data->date = $request->date;
        $data->dob = $request->dob;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->print_name = $request->print_name;
        $data->address = $request->address;
        $data->profession = $request->profession;
        $data->created_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        } else {
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Volunteer::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {
        $data = Volunteer::find($request->codeid);
        $data->date = $request->date;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->print_name = $request->print_name;
        $data->address = $request->address;
        $data->profession = $request->profession;
        $data->dob = $request->dob;
        $data->updated_by = Auth::user()->id;

        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        if(Volunteer::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }

    public function activevolunteer(Request $request)
    {
        $data = Volunteer::find($request->id);
        $data->status = $request->status;
        $data->save();

        if($request->status==1){
            $active = Volunteer::find($request->id);
            $active->status = $request->status;
            $active->save();


            $adminmail = ContactMail::where('id', 1)->first()->email;
            $contactmail = $data->email;

                $array['contactmail'] = $contactmail;
                $array['name'] = $data->name;
                $array['email'] = $data->email;
                $array['message'] = "Volunteer registration approved successfully.";
                $array['subject'] = "Volunteer registration approved";
                $array['from'] = 'do-not-reply@aidmeuk.com';
                
                $a = Mail::to($contactmail)
                    ->send(new VolunteerMail($array));




            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Active Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $deactive = Volunteer::find($request->id);
            $deactive->status = $request->status;
            $deactive->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
            return response()->json(['status'=> 303,'message'=>$message]);
        }

    }
}
