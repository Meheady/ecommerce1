<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use function view;

class adminController extends Controller
{
    public function index(){
        return view('admin.home.home');
    }
}
