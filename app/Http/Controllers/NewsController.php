<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = Post::latest()->paginate();
        $related = Post::inRandomOrder()->paginate(5);
        return view('news.index', ['news' => $news, 'related' => $related]);
    }
    public function category($alias, Request $request)
    {
        $related = Post::inRandomOrder()->paginate(5);
        $category = Category::where('slug', $alias)->firstOrFail();
        $news = $category->posts()->paginate();
        return view('news.index', ['category'=>$category,'news' => $news, 'related' => $related]);
    }
    public function detail($alias, Request $request)
    {
        $post = Post::where('slug',$alias)->firstOrFail();
        return view('news.detail', ['post' => $post]);
    }
}
