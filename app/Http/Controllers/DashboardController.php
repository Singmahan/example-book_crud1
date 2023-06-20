<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        // total post
        $total_posts = Post::count();
        $total_trash_post = Post::onlyTrashed()->count();
        $total_authors = Author::count();
        $total_category = Category::count();
        return view('dashboard', compact(
            'total_posts',
            'total_trash_post',
            'total_authors',
            'total_category'
        ));
    }
}
