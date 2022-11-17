<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\status;


class statusController extends Controller
{
    public function index(){
        $statuss = status::all();
        return view('admin.status.list', compact('statuss'));
    }
    public function create(){
        return view('admin.status.create');
    }
    public function store(Request $request){


        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        status::create([
            'name' =>$request->name,

        ]);
        return redirect()->route('admin.status.index')->with('success', 'Created successfully!' );
    }
    public function edit($id){
        $statuss = status::find($id);
        return view('admin.status.edit', compact('statuss'));
    }
    public function update(Request $request, $id){
        $this->validate($request,
            [
                'name' =>'required',
            ]
            );

        status::where('id', $id)->update([
            'name' =>$request->name,

        ]);
        return redirect()->route('admin.status.index', $id)->with('success', 'Edited successfully!' );

    }
    public function delete($id){
        status::where('id', $id)->delete();
        return redirect()->route('admin.status.index', $id)->with('success', 'Deleted successfully!' );
    }
}
