<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $data = BlogCategory::where('type', 1)->orderby('id', 'DESC')->get();
        return view('admin.blog_categories.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->created_by = auth()->id();
        $category->save();

        return response()->json(['status' => 200, 'message' => 'Category created successfully.']);
    }

    public function edit($id)
    {
        $data = BlogCategory::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }

        $category = BlogCategory::findOrFail($request->codeid);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->updated_by = auth()->id();
        $category->save();

        return response()->json(['status' => 200, 'message' => 'Category updated successfully.']);
    }

    public function delete($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return response()->json(['status' => 200, 'message' => 'Category deleted successfully.']);
    }

    public function updateStatus(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->status = $request->status;
        $category->save();

        return response()->json(['status' => 200, 'message' => 'Status updated successfully.']);
    }

}