<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('kontak'); // Nama view yang akan ditampilkan
    }
}
