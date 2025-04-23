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
        $data = Blog::with('images')->where('type', 1)->with('category')->orderby('id', 'DESC')->get();
        $categories = BlogCategory::where('type', 1)->where('status', 1)->latest()->get();
        return view('admin.blog.index', compact('data', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'source' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->errors()]);
        }

        $blog = new Blog();
        $blog->blog_category_id = $request->blog_category_id;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->source = $request->source;
        $blog->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/blogs'), $imageName);
        
                $blog->images()->create([
                    'image' => '/images/blogs/' . $imageName,
                ]);
            }
        }      

        $blog->slug = $this->generateUniqueSlug($request->title, Blog::class);
        $blog->created_by = auth()->id();
        $blog->save();

        return response()->json(['status' => 200, 'message' => 'Blog created successfully.']);
    }

    private function generateUniqueSlug($title, $model)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;
    
        while ($model::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
    
        return $slug;
    }    

    public function edit($id)
    {
        $data = Blog::with('images')->findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
    
        foreach ($blog->images as $existingImage) {
            if (file_exists(public_path($existingImage->image))) {
                unlink(public_path($existingImage->image));
            }
            $existingImage->delete();
        }
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/blogs'), $imageName);
    
                $blog->images()->create([
                    'image' => '/images/blogs/' . $imageName,
                ]);
            }
        }
    
        // $blog->slug = Str::slug($request->title);
        $blog->updated_by = auth()->id();
        $blog->save();
    
        return response()->json(['status' => 200, 'message' => 'Blog updated successfully.']);
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
          foreach ($blog->images as $existingImage) {
            if (file_exists(public_path($existingImage->image))) {
                unlink(public_path($existingImage->image));
            }
            $existingImage->delete();
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