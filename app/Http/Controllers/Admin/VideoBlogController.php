<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\BlogComment;

class VideoBlogController extends Controller
{
  public function index()
  {
      $data = Blog::where('type', 2)->with('category')->orderby('id', 'DESC')->get();
      $categories = BlogCategory::where('type', 2)->where('status', 1)->latest()->get();
      return view('admin.blog.video', compact('data', 'categories'));
  }

  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'blog_category_id' => 'required|exists:blog_categories,id',
          'title' => 'nullable|string|max:255',
          'description' => 'nullable|string',
          'video' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:40960'
      ]);

      if ($validator->fails()) {
          return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
      }

      $blog = new Blog();
      $blog->blog_category_id = $request->blog_category_id;
      $blog->title = $request->title;
      $blog->slug = Str::slug($request->title);
      $blog->type = 2;
      $blog->created_by = auth()->id();

      if ($request->hasFile('video')) {
          $video = $request->file('video');
          $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
          $video->move(public_path('images/video-blogs'), $videoName);
          $blog->video = '/images/video-blogs/' . $videoName;
      }
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
          'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:40960'
      ]);
  
      if ($validator->fails()) {
          return response()->json(['status' => 422, 'message' => $validator->errors()->first()]);
      }
  
      $blog = Blog::findOrFail($request->codeid);
      $blog->blog_category_id = $request->blog_category_id;
      $blog->title = $request->title;
      $blog->description = $request->description;
      $blog->link = $request->link;
      $blog->slug = Str::slug($request->title);
      $blog->updated_by = auth()->id();
  
      if ($request->hasFile('video')) {
          if ($blog->video && file_exists(public_path($blog->video))) {
              unlink(public_path($blog->video));
          }

          $video = $request->file('video');
          $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
          $video->move(public_path('images/video-blogs'), $videoName);
          $blog->video = '/images/video-blogs/' . $videoName;
      }

      $blog->save();
  
      return response()->json(['status' => 200, 'message' => 'Blog updated successfully.']);
  }  

  public function delete($id)
  {
      $blog = Blog::findOrFail($id);
  
      if ($blog->video && file_exists(public_path($blog->video))) {
          unlink(public_path($blog->video));
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