<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\BlogComment;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::with('category')->orderby('id', 'DESC')->get();
        $categories = BlogCategory::latest()->get();
        return view('admin.blog.index', compact('data', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }

        $blog = new Blog();
        $blog->blog_category_id = $request->blog_category_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->source = $request->source;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $blog->image = '/images/blogs/' . $imageName;
        }

        $blog->slug = Str::slug($request->title);
        $blog->created_by = auth()->id();
        $blog->save();

        return response()->json(['status' => 200, 'message' => 'Blog created successfully.']);
    }

    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
        }

        $blog = Blog::findOrFail($request->codeid);
        $blog->blog_category_id = $request->blog_category_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->source = $request->source;

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blogs'), $imageName);
            $blog->image = '/images/blogs/' . $imageName;
        }

        $blog->slug = Str::slug($request->title);
        $blog->updated_by = auth()->id();
        $blog->save();

        return response()->json(['status' => 200, 'message' => 'Blog updated successfully.']);
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        $blog->delete();

        return response()->json(['status' => 200, 'message' => 'Blog deleted successfully.']);
    }

    public function updateStatus(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = $request->status;
        $blog->save();

        return response()->json(['status' => 200, 'message' => 'Status updated successfully.']);
    }

    public function viewComments($id)
    {
        $comments = BlogComment::where('blog_id', $id)->get();
        return view('admin.blog.comments', compact('comments'));
    }

    public function updateCommentStatus(Request $request, $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->status = $request->status;
        $comment->save();

        return response()->json([
            'status' => 200,
            'message' => 'Comment status updated successfully.'
        ]);
    }

}