<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function test1()
    {
        return view('admin.test1');
    }

    public function test2()
    {
//        Route::is();
        return view('admin.test2');
    }
}
