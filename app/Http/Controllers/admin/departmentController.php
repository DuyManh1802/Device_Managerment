<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;

class departmentController extends Controller
{
    public function index(){
        $departments = department::all();
        return view('admin.action.department.list', compact('departments'));
    }
    public function create(){
        return view('admin.action.department.create');
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
            'manager' =>$request->name,
            'address' =>$request->name,

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
            'manager' =>$request->name,
            'address' =>$request->name,

        ]);
        return redirect()->route('admin.action.department.index', $id)->with('success', 'Edited successfully!' );

    }
    public function delete($id){
        department::where('id', $id)->delete();
        return redirect()->route('admin.action.department.index', $id)->with('success', 'Deleted successfully!' );
    }
}
