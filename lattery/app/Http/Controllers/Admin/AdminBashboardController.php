<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
}
