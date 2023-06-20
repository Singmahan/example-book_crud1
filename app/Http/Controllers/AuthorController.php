<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->get();
        return view('authors', compact('authors'));
    }
    public function store(Request $request)
    {
        // dd($request->input());
        $author = new Author();

        $request->validate([
            'textname' => 'required',
            'textdesc' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        $author->name = $request->textname;
        $author->bio = $request->textdesc;

        // photo
        $extension = $request->file('photo')->extension();
        $new_name = date('YmdHis') . '.' . $extension;
        $request->file('photo')->move(public_path('uploads/'), $new_name);
        $author->photo = $new_name;
        $author->save();
        return redirect()->route('manage-author')->with('success', 'Added Successfully.');
    }
    public function edit($id)
    {
        $author_detail = Author::where('id', $id)->get();
        return view('edit-authors', compact('author_detail'));
    }
    public function update(Request $request, $id)
    {
        $author = Author::where('id', $id)->first();

        $request->validate([
            'textname' => 'required',
            'textdesc' => 'required'
        ]);
        // photo
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
            ]);
            if (file_exists(public_path('uploads/' . $author->photo)) and !empty($author->photo)) {
                unlink(public_path('uploads/'. $author->photo));
            }
            // photo
            $extension = $request->file('photo')->extension();
            $new_name = date('YmdHis') . '.' . $extension;
            $request->file('photo')->move(public_path('uploads/'), $new_name);
            $author->photo = $new_name;
        }
        $author->name = $request->textname;
        $author->bio = $request->textdesc;
        $author->update();
        return redirect()->route('manage-author')->with('success', 'Updated Successfully.');
    }
    public function delete($id){
        $author = Author::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $author->photo)) and !empty($author->photo)) {
            unlink(public_path('uploads/'. $author->photo));
        }
        $author->delete();
        return redirect()->route('manage-author')->with('success', 'Deleted Successfully.');
    }
}
