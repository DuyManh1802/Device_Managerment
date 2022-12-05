<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\device;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class categoryController extends Controller
{
    public function index(){
        $devices = device::all();
        $categories = category::all();
        return view('admin.category.list', compact('devices','categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,
            [
                'name' =>'required'
            ]
            );
        

        category::create([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Created successfully!' );
    }
    public function edit($id){
        $categories = category::find($id);
        return view('admin.category.edit', compact('categories'));
    }
    public function update(Request $request, $id){

        $this->validate($request,
            [
                'name' =>'required'
            ]
            );
        
        //c1 tim r update
        // $categories = category::find($id);
        // $categories->update([
        //     'name' =>$request->name,
        //     'slug' => $slug
        // ]);
        
        //c2 update truc tiep
        category::where('id', $id)->update([
            'name' =>$request->name,
        ]);
        return redirect()->route('admin.category.index', $id)->with('success', 'Edited successfully!' );
    }
    public function delete($id){
        category::where('id', $id)->delete();
        return redirect()->route('admin.category.index')->with('success', 'Deleted successfully');
    }
}
