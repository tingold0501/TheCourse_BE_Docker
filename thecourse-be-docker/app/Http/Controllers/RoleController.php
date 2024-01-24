<?php

namespace App\Http\Controllers;

use App\Models\RoleM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = RoleM::all();
        return response()->json($result);
        dd($result);
    }
    public function getActiveRole(){
        $result = RoleM::where('status',1)->get();
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request,RoleM $roleM)
    {
        $validator = Validator::make($request->all(), [
            'roleName' => 'required|unique:roles,name',
        ],[
            'roleName.required' => 'Tên Role không được trống',
            'roleName.unique' => 'Tên Role đang tồn tại',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['check' => false, 'msg' => $validator->errors()]);
        }
        RoleM::create(['name'=>$request->roleName]);
        return response()->json(['check'=>true,'msg'=>'Thêm Role Thành Công']);
    }

    public function delete (Request $request,RoleM $roleM){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:roles,id',
        ],[
            'id.required' => 'ID Role không được trống',
            'id.exists' => 'ID Role đang tồn tại',
        ]);
        if ($validator->fails()) {
            return response()->json(['check' => false, 'msg' => $validator->errors()]);
        }
        $check=User::where('idRole',$request->id)->count('id');
        if($check!=0){
            return response()->json(['check'=>false,'msg'=>'Có tài khoản tồn tại trong loại này']);
        }
        if($request->id ==1||$request->id==2||$request->id==3){
            return response()->json(['check'=>false,'msg'=>'Không được xoá']);
       }
        RoleM::where('id',$request->id)->delete();
        return response()->json(['check'=>true]);
    }

    public function updateRoleName (Request $request,RoleM $roleM){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:roles,id',
            'nameRole' => 'required|unique:roles,name',
        ],[
            'id.required' => 'ID Role không được trống',
            'id.exists' => 'ID Role đang tồn tại',
            'nameRole.required' => 'Tên Role Đã Tồn Tại',
            'nameRole.unique' => 'Tên Role đang tồn tại',
        ]);
        if ($validator->fails()) {
            return response()->json(['check' => false, 'msg' => $validator->errors()]);
        }
        RoleM::where('id',$request->id)->update(['name'=>$request->nameRole]);
        return response()->json(['check'=> true, 'msg' => 'Thay Đổi Thành Công']);
    }
    public function updateStatus (Request $request,RoleM $roleM){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:roles,id',
            'status' => 'required|numeric|min:0|max:1',
        ],[
            'id.required' => 'ID Role không được trống',
            'id.exists' => 'ID Role đang tồn tại',
            'status.required' => 'Trạng thái rỗng',
            'status.numeric' => 'Trạng thái không hợp lệ',
            'status.min' => 'Trạng thái không hợp lệ',
            'status.max' => 'Trạng thái không hợp lệ',
        ]);
        RoleM::where('id',$request->id)->update(['status'=>$request->status]);
        return response()->json(['check'=>true]);
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
    public function show(RoleM $roleM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleM $roleM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleM $roleM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoleM $roleM)
    {
        //
    }
}
