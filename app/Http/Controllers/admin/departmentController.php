<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\device;
use App\Models\devicedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentController extends Controller
{
    // status =0 thì hỏng
    // status =1 thì dùng được
    // status =2 thì sửa chữa
    public function index(){
        $departments = department::all();
        return view('admin.action.department.list', compact('departments'));
    }
    public function create(){
        return view('admin.action.department.create');
    }

    function show($id){
        $department = department::find($id);
        $devices = $department->devices()->get();
        return view('admin.action.department.show', ['department'=>$department, 'devices'=> $devices]);
    }

    public function store(Request $request){


        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        department::create([
            'name' =>$request->name,
            'manager' =>$request->manager,
            'address' =>$request->address,

        ]);
        return redirect()->route('admin.action.department.index')->with('success', 'Created successfully!' );
    }
    public function edit($id){
        $departments = department::find($id);
        return view('admin.action.department.edit', compact('departments'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        department::where('id', $id)->update([
            'name' =>$request->name,
            'manager' =>$request->manager,
            'address' =>$request->address,

        ]);
        return redirect()->route('admin.action.department.index', $id)->with('success', 'Edited successfully!' );

    }
    public function delete($id){
        department::where('id', $id)->delete();
        return redirect()->route('admin.action.department.index', $id)->with('success', 'Deleted successfully!' );
    }

    // function formAddDevice($id){
    //     return view('admin.action.department.add_device', [
    //         'id' => $id
    //     ]);
    // }
    function formAddDevice(){
        $devices = device::all();
        $departments = department::all();
        $array =  [];
        foreach ($departments as $key => $value) {
            $array[$key] = $value;
        }

        return view('admin.action.department.add_device', compact('devices', 'departments'));
    }

    // function addDevice(Request $request, $id){
    //     try{
    //         $device_id = $request->device_id;
    //         // $data = $request->only(['department_used','amount_used','status']);
    //         $data = ['department_used' => 1,'amount_used' => 1,'status' => 1];
    //         DB::beginTransaction();
    //         $department = department::find($id);
    //         // lấy all  $department->devices()->where()->get();

    //         $department->devices()->detach([$device_id]);
    //         $department->devices()->attach($device_id, $data);
    //         DB::commit();
    //         return redirect()->route('admin.action.department.listDepartment')->with('success', 'Created successfully!' );
    //     }catch(\Exception $ex){
    //         dd($ex);
    //         DB::rollBack();
    //         return back()->with('notification_error', 'Lỗi !!! ');
    //     }
    // }

    function addDevice(Request $request){
        try{
            $device_id = $request->device_id;

            // $data = $request->only(['department_used','amount_used','status']);

            /// lấy bản ghi có depat=
            $item = devicedetail::where(['department_id' => $request->department, 'device_id' => $device_id])->first();

            $data = [
                'status' => 1,
            ];
            DB::beginTransaction();
            $department = department::find($request->department);

            // lấy all  $department->devices()->where()->get();
             $department->devices()->detach([$device_id]); // xóa
            $department->devices()->attach($device_id, $data); // thêm
            DB::commit();
            return redirect()->route('admin.department.listDepartment')->with('success', 'Created successfully!' );
        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return back()->with('notification_error', 'Lỗi !!! ');
        }


    }

    public function listDepartment(){
        $departments = department::all();
        return view('admin.action.department.listDepartment', compact('departments'));
    }

    /// $item = devicedetail::where(['deperr...' => $deparment , 'device...' => $id])->first();
    // $item->... = giá trị mới;
    // $item->save();

    public function deleteDevice($id, $deparment){
        try{
            DB::beginTransaction();
            $department = department::find($deparment);

            $department->devices()->detach([$id]);
            DB::commit();
            return redirect()->back()->with('success', 'Deleted successfully!' );


        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function updateStatusDevice($id, $department){
        try{

            DB::beginTransaction();

            $item = devicedetail::where(['department_id' => $department, 'device_id' => $id])->first();

            $item->status = 0;
            // $item->amount_used == $item->amount_used - 1;
            $item->save();
            DB::commit();
            return redirect()->back()->with('success', 'Upleted successfully!' );


        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function fixed($id, $department){
        try{

            DB::beginTransaction();

            $item = devicedetail::where(['department_id' => $department, 'device_id' => $id])->first();

            $item->status = 2;
            $item->save();
            DB::commit();
            return redirect()->back()->with('success', 'Upleted successfully!' );


        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }


}