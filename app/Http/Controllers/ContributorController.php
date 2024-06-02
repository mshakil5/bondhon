<?php

namespace App\Http\Controllers;

use App\Models\Contributor;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class ContributorController extends Controller
{
    public function index()
    {
        $data = Contributor::orderby('id','DESC')->get();
        return view('admin.contributor.index',compact('data'));
    }
    
    public function store(Request $request)
    {
        $data = new Contributor();
        $data->description = $request->description;

        // image
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/contributor'), $imageName);
            $data->image= $imageName;
        }
        // end
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
        $info = Contributor::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request)
    {
        $data = Contributor::find($request->codeid);

        if($request->image != 'null'){

            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:8048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/contributor'), $imageName);
            $data->image= $imageName;
        }
            $data->description = $request->description;
            $data->status = "0";
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
        if(Contributor::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }
}
