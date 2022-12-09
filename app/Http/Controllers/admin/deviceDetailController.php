<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\devicedetail;
use App\Models\device;
use Illuminate\Support\Facades\DB;


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

    public function listBroken($id, $device){
        // $devicedetail = devicedetail::find($id);
        // $deviceBroken = $devicedetail->devices()->where('status', 0)->get();
        // $deviceBroken->count();
        // $ids = devicedetail::where(['device_id'=>$device, 'id' =>$id])->where('status', 0)->get()->pluck('device_id')->toArray();
        $ids  = DB::table('devicedetail')
        ->join('device', 'device.id', '=', 'devicedetail.device_id')->where('devicedetail.status','=', 0)
        ->get();
        $devices = $ids;
        // return view('admin.action.devicedetail.listBroken');
    }




    //ids = deparent_device::where(deparent_id, $id)->where('status' ,0)->get()->pluck('device_id')->toArray(); [1,2,33];
        // all = device::whereIn('id', ids)->get()


}
