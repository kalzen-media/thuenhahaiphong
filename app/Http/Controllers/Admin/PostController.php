<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitPostRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Log;
use DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::latest();
        $records = $query->paginate();
        return view('admin.post.index',compact('records'));
    }
    
    public function create()
    {
        $categories = Category::query()->whereNull('parent_id')->orderBy('name','asc')->get();
        return view('admin.post.form',compact('categories'));
    }
    
    public function category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'parent_id' => 'nullable|integer'
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }
        $created = Category::create($validator->validated());
        return view('admin.shared.select-category',[
            'categories'=>Category::query()->whereNull('parent_id')->orderBy('name','asc')->get()
        ]);
    }
    public function insert()
    {
        $records = DB::table('bai_viet')->get();
        foreach ($records as $record)
        {
            DB::beginTransaction();
            try {
            $input['title']= $record->TieuDe;
            $input['description'] = $record->MoTaNgan;
            $input['content'] = $record->NoiDung;
            $input['slug'] = $record->Slug;
            $input['user_id'] = 1;
            $input['status'] = 1;
            $input['created_at'] = date('Y-m-d h:i:s', $record->NgayTao);
            $post = Post::create($input);
            $post->categories()->sync($record->IdChuyenMuc);
            $post->images()->create(['url' => $record->Thumbnail]);
            DB::commit();
            }
            catch(Exception $ex) {
                DB::rollback();
                dd($ex);
            }
        }
    }
    public function store(SubmitPostRequest $request)
    {
        DB::beginTransaction();
        try {
            $post = Post::create($request->only(['title','description','content','status','is_promotion']));
            $post->categories()->sync($request->category_id);
            $post->tags()->sync(collect(explode(', ',$request->tags))->map(function($item){return Tag::updateOrCreate(['name'=>$item]);})->pluck('id'));
            $post->images()->create(['url' => $request->image]);
            DB::commit();
            return redirect()->route('admin.post.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $categories = Category::query()->whereNull('parent_id')->orderBy('name','asc')->get();
        $record = Post::find($id);
        return view('admin.post.form',compact('categories','record'));
    }
    
    public function update(SubmitPostRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $post = Post::find($id);
            $post->update($request->only(['title','description','content','status','is_promotion']));
            $post->categories()->sync($request->category_id);
            $post->tags()->sync(collect(explode(', ',$request->tags))->map(function($item){return Tag::updateOrCreate(['name'=>$item]);})->pluck('id'));
            $post->images()->first()->update(['url' => $request->image]);
            DB::commit();
            return redirect()->route('admin.post.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            DB::rollback();
            return back()->withInput();
        }
    }
    
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
    
}
