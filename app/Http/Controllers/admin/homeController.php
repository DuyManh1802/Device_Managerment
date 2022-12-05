<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){
        $categories = category::all();
        return view('admin.home.index', compact('categories'));
    }
}
