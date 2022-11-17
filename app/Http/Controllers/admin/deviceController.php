<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\category;
use App\Models\supplier;
use App\Models\status;
use Nette\Utils\Random;
use Illuminate\Support\Str;


class deviceController extends Controller
{
    public function index(){
        $devices = device::paginate(20);
        return view('admin.device.list', compact('devices'));
    }
    public function create(){
        $categories = category::all();
        $suppliers = supplier::all();
        // $statuss = status::all();
        return view('admin.device.create', compact('categories', 'suppliers'));
    }
    public function store(Request $request){
        $this->validate($request,
            [
                'category_id' =>'required',
                'supplier_id' =>'required',
                'name' =>'required',
                'image' =>'required',
                'price' =>'required',
                'configuration' =>'required',
                // 'status_id' =>'required'
            ]
            );
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name_file = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                if(strcasecmp($extension, 'jpg')||strcasecmp($extension, 'png')||strcasecmp($extension, 'jepg')){
                    $image = Str::random(5) ."_". $name_file;
                    while(file_exists("image/device/" .$image)){
                        $image = Str::random(5) ."_". $name_file;
                    }
                    $file->move('image/device', $image);
                }
            }

            device::create([
                'category_id'=>$request->category_id,
                'supplier_id'=>$request->supplier_id,
                'name'=>$request->name,
                'image'=>$image,
                'price'=>$request->price,
                'configuration'=>$request->configuration,
                'status_id'=>$request->status_id

            ]);
        return redirect()->route('admin.device.index')->with('success', 'Created successfully!' );
            
    }
    public function edit($id){
        $devices = device::find($id);
        $categories = category::all();
        $suppliers = supplier::all();
        return view('admin.device.edit', compact('devices', 'categories', 'suppliers'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'category_id' =>'required',
                'supplier_id' =>'required',
                'name' =>'required',
                'image' =>'required',
                'price' =>'required',
                'configuration' =>'required',
            ]
            );
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name_file = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension();

                if(strcasecmp($extension, 'jpg')||strcasecmp($extension, 'png')||strcasecmp($extension, 'jepg')){
                    $image = Str::random(5) ."_". $name_file;
                    while(file_exists("image/device/" .$image)){
                        $image = Str::random(5) ."_". $name_file;
                    }
                    $file->move('image/device', $image);
                }
            }

            $devices = device::find($id);
            $devices->update([
                'category_id'=>$request->category_id,
                'supplier_id'=>$request->supplier_id,
                'name'=>$request->name,
                'image'=> isset($image) ? $image : $devices->image,
                'price'=>$request->price,
                'configuration'=>$request->configuration,
                'status_id'=>$request->status_id
            ]);
            
        return redirect()->route('admin.device.index')->with('success', 'Updated successfully!' );
    }

    public function delete($id){
        device::where('id', $id)->delete();
        return redirect()->route('admin.device.index')->with('success', 'Deleted successfully');
    }
}
