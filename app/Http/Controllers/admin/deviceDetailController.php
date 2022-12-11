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

    public function listBroken(){
        $ids  = DB::table('devicedetail')
        ->join('device', 'device.id', '=', 'devicedetail.device_id')->join('department', 'department.id', '=', 'devicedetail.department_id')
        ->where('devicedetail.status','=', 0)->get();
        $devices = $ids;

        // $time = DB::table('devicedetail')->where('status', '=', 0)->get('update_at');
        return view('admin.devicedetail.listBroken', [ 'devices' => $devices]);
    }

    public function fixed(){
        try{

            DB::beginTransaction();

            $device = devicedetail::where('devicedetail.status', '=', 0)->first();
            $device->status = 2;
            $device->save();
            DB::commit();
            return redirect()->back()->with('success', 'Upleted successfully!' );


        }catch(\Exception $ex){
            dd($ex);
            DB::rollBack();
            return redirect()->back()->with('notification_error', 'Lỗi !!! ');
        }
    }

    public function listFixed(){
        $devices = DB::table('devicedetail')
        ->join('device', 'device.id', '=', 'devicedetail.device_id')
        ->where('devicedetail.status','=', 2)->get();
        return view('admin.devicedetail.listFixed', [ 'devices' => $devices]);

    }

    //ids = deparent_device::where(deparent_id, $id)->where('status' ,0)->get()->pluck('device_id')->toArray(); [1,2,33];
        // all = device::whereIn('id', ids)->get()


}
