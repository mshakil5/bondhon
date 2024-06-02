<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
Use Image;
use App\Models\Master;
use App\Models\Slider;

class MasterController extends Controller
{
    public function index()
    {
        $data = Master::orderby('id','DESC')->get();
        return view('admin.master.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        $data = new Master();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->description = $request->description;
        // intervention
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data->image= $imageName;
        }
        // end
        $data->status = "1";
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
        $info = Master::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $data = Master::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->image != 'null'){

            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data->image= $imageName;
        }
        $data->status = "0";
        $data->updated_by = Auth::user()->id;

        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }


    public function homeTopSection()
    {
        $data = Slider::where('id','1')->first();
        return view('admin.master.topsection',compact('data'));
    }

    public function homeTopSectionUpdate(Request $request)
    {
        $data = Slider::find($request->data_id);
        $data->left_title = $request->left_title;
        $data->left_description = $request->left_description;
        $data->right_header = $request->right_header;
        $data->right_title1 = $request->right_title1;
        $data->right_description1 = $request->right_description1;
        $data->right_title2 = $request->right_title2;
        $data->right_description2 = $request->right_description2;
        $data->right_title3 = $request->right_title3;
        $data->right_description3 = $request->right_description3;
        $data->status = "0";
        $data->updated_by = Auth::user()->id;
        if ($data->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }
}
