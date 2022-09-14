<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catalogue;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $products = Product::active()->latest()->paginate();
        return view('product.index',compact('catalogues','products'));
    }
    public function catalogue($alias)
    {
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $catalogue = Catalogue::where('slug',$alias)->firstOrFail();
        //keyword
        $query = $catalogue->products()->active();
        if (request('sort')=='price-asc') {
            $query->orderBy('price','asc');
        } else if (request('sort') == 'price-desc') {
            $query->orderBy('price','desc');
        } else {
            $query->orderBy('created_at','desc');
        }
        if (request('keyword')) {
            $query->where(function($p){
                $p->where('title','like','%'.request('keyword').'%')
                ->orWhere('description','like','%'.request('keyword').'%')
                ->orWhere('slug','like','%'.request('keyword').'%')
                ->orWhereHas('tags',function($tag){
                    $tag->where('name','like','%'.request('keyword').'%');
                })
                ->orWhereHas('catalogues',function($tag){
                    $tag->where('name','like','%'.request('keyword').'%')
                    ->orWhere('slug','like','%'.request('keyword').'%');
                });
            });
        }
        $products = $query->paginate();
        return view('product.index',compact('catalogue','products','catalogues'));
    }
    public function search()
    {
        $catalogues = Catalogue::orderBy('id','asc')->get();
        $query = Product::with(['catalogues','images'])->active();
        
        if (request('sort')=='price-asc') {
            $query->orderBy('price','asc');
        } else if (request('sort') == 'price-desc') {
            $query->orderBy('price','desc');
        } else {
            $query->orderBy('created_at','desc');
        }
        $products = $query->where(function($p){
            $p->where('title','like','%'.request('keyword').'%')
            ->orWhereHas('catalogues',function($q){
                $q->where('name','like','%'.request('keyword').'%');
            });
        })->paginate();
        return view('product.index',compact('products','catalogues'));
    }
    public function detail($alias)
    {
        $product = Product::active()->where('slug',$alias)->firstOrFail();
        DB::table('products')->where('id',$product->id)->increment('viewed');
       // dd($product->catalogue);
        $catalogue = Catalogue::where('id',$product->catalogues->first()->id)->firstOrFail();
        $related = $catalogue->products()->active()->where('district_id', $product->district_id)->orderBy('id', 'desc')->limit(5)->get();
        return view('product.detail',compact('product','related'));
    }
}
