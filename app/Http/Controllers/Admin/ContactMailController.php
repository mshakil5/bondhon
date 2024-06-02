<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class ContactMailController extends Controller
{
    public function index()
    {
        $mail = ContactMail::where('id','=','1')->first();
        $data = ContactMail::orderby('id','DESC')->get();
        return view('admin.contactmail.index',compact('data','mail'));
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = ContactMail::where($where)->get()->first();
        return response()->json($info);
    }
    
    public function update(Request $request, $id)
    {
        $data = ContactMail::find($id);
        $data->email = $request->email;
        $data->status = "1";
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

}
