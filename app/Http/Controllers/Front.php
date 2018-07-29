<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Front extends Controller
{
    public function index() {
        return view('home');
    }

    public function create() {
        return view('create');
    }

    public function update() {
        return view('update');
    }

    public function check() {
        return view('check');
    }
}
