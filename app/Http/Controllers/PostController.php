<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    public function show(Post $post)
    {
        $post->load('comments.user');
        $category = $post->category;
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->take(10)
            ->get();

        $breadcrumbs = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => $category->name, 'url' => route('posts.index', ['category' => $category->id])],
            ['name' => $post->title, 'url' => ''],
        ];

        return view('posts.show', compact('post', 'breadcrumbs', 'relatedPosts'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mypost(Request $request)
    {
        // Base query to get posts authored by the authenticated user
        $query = Post::where('user_id', auth()->id());

        // Filter by category if specified
        $categoryId = $request->query('category');
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Filter by title if specified
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Order by created_at in descending order (newest first)
        $query->orderBy('created_at', 'desc');

        // Get the filtered and paginated list of posts
        $posts = $query->paginate(10); // 10 posts per page

        // Get up to 5 categories for the filter dropdown (if needed)
        $categories = Category::limit(5)->get();

        // Return the 'posts.mypost' view with the filtered posts and categories
        return view('posts.mypost', compact('posts', 'categories'));
    }


    public function index(Request $request)
    {
        // Base query to get all posts
        $query = Post::query();

        // Filter by category if specified
        $categoryId = $request->query('category');
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Filter by title if specified
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Filter by author if specified
        if ($request->has('author')) {
            $query->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('author') . '%');
            });
        }

        // Order by created_at in descending order (newest first)
        $query->orderBy('created_at', 'desc');

        // Get the filtered and paginated list of posts
        $posts = $query->paginate(10); // 10 posts per page

        // Get up to 5 categories for the filter dropdown
        $categories = Category::limit(5)->get();

        // Return the 'posts.index' view with the filtered posts and categories
        return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post($request->all());
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Tạo bài viết thành công.');
    }


    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->role === 'admin') {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->role==='admin') {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Cập nhật bài viết thành công.');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->role=== 'admin') {
            return redirect()->route('posts.index')->with('error', 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Xoá bài viết thành công.');
    }
    public function allPosts(Request $request)
    {
        // Logic to retrieve all posts
        $posts = Post::paginate(10); // Retrieve all posts, paginated
        $categories = Category::all();
        $breadcrumbs = [];

        // Other necessary logic (e.g., fetching categories, setting breadcrumbs)

        return view('posts.all', compact('posts', 'categories', 'breadcrumbs'));

    }

}
