<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
     public function index()
    {
        $title = ' Admin Home Sub Page';
        $message = 'Welcome to Admin Panel';
        
        
        return view('admin.index', compact('title', 'message'));
    }
}
