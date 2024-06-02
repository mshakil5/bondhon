<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\support\Facades\Auth;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('admin.sliders.index', compact('data'));
    }

    public function store(Request $request)
    {
        try{
            $master = new Slider();
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
            $master->photo= $imageName;
            $master->title = $request->title;
            $master->status= "1";
            $master->created_by= Auth::user()->id;
            $master->save();

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);

        }catch (\Exception $e){
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);

        }
    }

    public function edit($id)
    {
        $where = [
            'id'=>$id
        ];
        $info = Slider::where($where)->get()->first();
        return response()->json($info);
    }

    public function update(Request $request, $id)
    {
        $post = Slider::find($id);
        if ($request->image != 'null') {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $rand = mt_rand(100000, 999999);
            $imageName = time(). $rand .'.'.$request->image->extension();
            $request->image->move(public_path('images/slider'), $imageName);
            $post->photo= $imageName;
        }
        $post->title = $request->title;
        $post->updated_by = Auth::user()->id;
        if ($post->save()) {
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Slider Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }
        else{
            return response()->json(['status'=> 303,'message'=>'Server Error!!']);
        }
    }

    public function delete($id)
    {
        if(Slider::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }

    public function activeslider(Request $request)
    {
        $user = Slider::find($request->id);
        $user->status = $request->status;
        $user->save();

        if($request->status==1){
            $user = Slider::find($request->id);
            $user->status = $request->status;
            $user->save();
            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Active Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }else{
            $user = Slider::find($request->id);
            $user->status = $request->status;
            $user->save();
            $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Inactive Successfully.</b></div>";
        return response()->json(['status'=> 300,'message'=>$message]);
        }

    }
}
