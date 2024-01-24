<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
        dd($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'idRole' => 'required|exists:roles,id',
        ],[
            'name.required' => 'Tên Không Được Trống',
            'email.required' => 'Email Không Được Trống',
            'email.email' => 'Email Không Phải Dạng Email',
            'email.unique' => 'Email Đã Tồn Tại',
            'phone.required' => 'Phone Đang Trống',
            'phone.unique' => 'Số Điện Thoại Đã Tồn Tại',
            'idRole.required' => 'Mã Role Không Được Trống',
            'idRole.exists' => 'Mã Loại Không Tồn Tại',
        ]);
        if ($validator->fails()) {
            return response()->json(['check' => false, 'msg' => $validator->errors()]);
        }
        $password = random_int(10000, 99999);
        User::create(['name' => $request->name, 'email' => $request->email, 'phone' =>$request->phone,'password'=>$password, 'role_id' =>$request->idRole]);
        return response()->json(['check' => true, 'msg' => 'Đăng Ký Thành Công']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
