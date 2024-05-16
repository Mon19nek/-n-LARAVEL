<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Logic to retrieve all posts
        $posts = Post::paginate(10); // Retrieve all posts, paginated
        $categories = Category::all();
        $breadcrumbs = [];

        // Other necessary logic (e.g., fetching categories, setting breadcrumbs)

        return view('home', compact('posts', 'categories', 'breadcrumbs'));
    
    }

}
