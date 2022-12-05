<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\devicedetail;


class deviceDetailController extends Controller
{
    
    // public function edit($device_id, $department_id){
    //     $devicedetails = devicedetail::find($device_id, $department_id);
    //     return view('admin.action.devicedetail.edit', compact('devicedetails'));
    // }

    public function update(Request $request, $device_id, $department_id){
        $this->validate($request,
            [
                'name' =>'required',
                'manager' =>'required',
                'address' =>'required'
            ]
            );

        devicedetail::where('device_id', 'device_id', $device_id, $department_id)->update([
            'status' =>$request->status,

        ]);
        return redirect()->route('admin.action.department.show')->with('success', 'Edited successfully!' );

    }
    public function delete($id){
        devicedetail::where('id', $id)->delete();
        return redirect()->route('admin.action.devicedetail.index', $id)->with('success', 'Deleted successfully!' );
    }
}
