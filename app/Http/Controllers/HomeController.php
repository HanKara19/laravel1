<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Benim Sayfam',
            'message' => 'ilk prjeme hoş geldin' // Sadece bu kısmı değiştirdik!
        ];

        return view('home', $data);
    }
}