<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $data = array('title' => '首頁' ,'hello' => '大家好～～'
            );
    	return view('home',$data);
    }

    public function show($id)
	{
        $data = '大家好～～'.$id;
	    return view('home',array('title' => '首頁' ,'hello' => $data
            ));
	}
}
