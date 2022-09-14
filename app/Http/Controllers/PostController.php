<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name','asc')->get();
        $featured_posts = Post::active()->orderBy('viewed','desc')->paginate();
        $posts = Post::active()->paginate();
        return view('post.index',compact('categories','posts','featured_posts'));
    }
    public function detail($alias)
    {
        $post = Post::active()->where('slug',$alias)->firstOrFail();
        DB::table('posts')->where('id',$post->id)->increment('viewed');
        $categories = Category::orderBy('name','asc')->whereNull('parent_id')->get();
        $most_view = Post::active()->orderBy('viewed','desc')->limit(5)->get();
        return view('post.detail',compact('post', 'categories', 'most_view'));
    }
    public function category($alias)
    {
        $categories = Category::orderBy('name','asc')->get();
        $category = Category::where('slug',$alias)->firstOrFail();
        if ($category->parent_id != '0')
        {
            $category_parent = Category::find($category->parent_id);
        }
        $posts = $category->posts()->active()->paginate();
        $featured_posts = Post::active()->orderBy('id','desc')->paginate();
        return view('post.index',compact('category','posts','categories','featured_posts', 'category_parent'));
    }
    public function search()
    {
        $featured_posts = Post::active()->orderBy('viewed','desc')->paginate();
        $categories = Category::orderBy('name','asc')->get();
        $query = Post::latest()->active()->with(['tags','images']);
        $posts = $query->where(function($p){
            $p->where('title','like','%'.request('keyword').'%')
            ->orWhereHas('categories',function($q){
                $q->where('name','like','%'.request('keyword').'%');
            });
        })->paginate();
        return view('post.index',compact('posts','categories','featured_posts'));
    }
}
