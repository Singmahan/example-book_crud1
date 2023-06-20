<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->get();
        $categories = Category::latest()->get();
        return view('create-post', compact('authors', 'categories'));
    }
    public function show()
    {
        $posts = Post::with('rAuthor')->with('rCategory')->latest()->get();
        return view('manage-post', compact('posts'));
    }
    public function store(Request $request)
    {
        // dd($request->input());
        $post = new Post();

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'author' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'thumnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->author_id = $request->author;
        $request->slug = strtolower($request->slug);
        $post->slug = str_replace(" ", "-", $request->slug);
        $post->short_description = $request->short_description;
        $post->description = $request->detail;

        // thumnail
        $extension = $request->file('thumnail')->extension();
        $new_name = date('YmdHis') . '.' . $extension;
        $request->file('thumnail')->move(public_path('uploads/posts/'), $new_name);
        $post->thumnail = $new_name;

        $post->save();
        return redirect()->route('manage-post')->with('success', 'Added Successfully.');
    }
    public function edit($id)
    {
        $authors = Author::latest()->get();
        $categories = Category::latest()->get();
        $post_detail = Post::with('rAuthor')->with('rCategory')->where('id', $id)->get();
        return view('edit-post', compact('post_detail', 'authors', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'author' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'short_description' => 'required'
        ]);
        if ($request->hasfile('thumnail')) {
            $request->validate([
                'thumnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
            // check file
            if (file_exists(public_path('uploads/posts/' . $post->thumnail)) and !empty($post->thumnail)) {
                unlink(public_path('uploads/posts/' . $post->thumnail));
            }
            // thumnail
            $extension = $request->file('thumnail')->extension();
            $new_name = date('YmdHis') . '.' . $extension;
            $request->file('thumnail')->move(public_path('uploads/posts/'), $new_name);
            $post->thumnail = $new_name;
        }
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->author_id = $request->author;
        $request->slug = strtolower($request->slug);
        $post->slug = str_replace(" ", "-", $request->slug);
        $post->short_description = $request->short_description;
        $post->description = $request->detail;

        $post->update();
        return redirect()->route('manage-post')->with('success', 'Updated Successfully.');
    }
    public function trash($id){
        $post = Post::where('id', $id)->first();
        // if (file_exists(public_path('uploads/posts/' . $post->thumnail)) and !empty($post->thumnail)) {
        //     unlink(public_path('uploads/posts/' . $post->thumnail));
        // }
        $post->delete();
        return redirect()->route('manage-post')->with('success', 'Trash Successfully.');
    }
    public function view_trashed_post(){
        $trash_posts = Post::onlyTrashed()->with('rAuthor')->with('rCategory')->get();
        return view('view-trash-post', compact('trash_posts'));
    }
    public function restore($id){
        Post::where('id',$id)->restore();
        return redirect()->route('view_trashed_post')->with('success', 'Restored Successfully.');
    }
    public function edit_trashed_post($id){
        $authors = Author::latest()->get();
        $categories = Category::latest()->get();
        $trash_post_detail = Post::onlyTrashed()->with('rAuthor')->with('rCategory')->where('id', $id)->get();
        return view('edit-trash-post', compact('trash_post_detail', 'authors', 'categories'));
    }
    public function update_trashed_post(Request $request, $id){
        $post = Post::onlyTrashed()->where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'author' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'short_description' => 'required'
        ]);
        if ($request->hasfile('thumnail')) {
            $request->validate([
                'thumnail' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
            // check file
            if (file_exists(public_path('uploads/posts/' . $post->thumnail)) and !empty($post->thumnail)) {
                unlink(public_path('uploads/posts/' . $post->thumnail));
            }
            // thumnail
            $extension = $request->file('thumnail')->extension();
            $new_name = date('YmdHis') . '.' . $extension;
            $request->file('thumnail')->move(public_path('uploads/posts/'), $new_name);
            $post->thumnail = $new_name;
        }
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->author_id = $request->author;
        $request->slug = strtolower($request->slug);
        $post->slug = str_replace(" ", "-", $request->slug);
        $post->short_description = $request->short_description;
        $post->description = $request->detail;

        $post->update();
        return redirect()->route('view_trashed_post')->with('success', 'Updated Successfully.');
    }
    public function delete($id){
        $post = Post::onlyTrashed()->where('id',$id)->first();
        if (file_exists(public_path('uploads/posts/' . $post->thumnail)) and !empty($post->thumnail)) {
            unlink(public_path('uploads/posts/' . $post->thumnail));
        }
        $post->forceDelete();
        return redirect()->route('view_trashed_post')->with('success', 'Deleted Successfully.');
    }
}
