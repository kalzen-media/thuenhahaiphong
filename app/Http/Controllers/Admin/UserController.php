<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::latest()->where('id','<>',auth()->user()->id);
        $records = $query->paginate();
        return view('admin.user.index',compact('records'));
    }
    
    public function create()
    {
        return view('admin.user.form');
    }
    
    public function store(CreateUserRequest $request)
    {
        try {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);
            $user = User::create($request->only(['name','email','status']));
            return redirect()->route('admin.user.index')->with('message', 'Thêm mới thành công');
        } catch(Exception $ex) {
            return back()->withInput();
        }
    }
    
    public function show($id)
    {
        
    }
    
    public function edit($id)
    {
        $record = User::find($id);
        return view('admin.user.form',compact('record'));
    }
    
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::find($id);
            if ($request->password) {
                $request->merge([
                    'password' => bcrypt($request->password),
                ]);
                $user->update($request->only(['name','password','status']));
            } else {
                $user->update($request->only(['name','status']));
            }
            return redirect()->route('admin.user.index')->with('message', 'Cập nhật thành công');
        }catch(Exception $ex) {
            return back()->withInput();
        }
    }
    
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>true,'message'=>'Xóa thành công']);
    }
    
}
