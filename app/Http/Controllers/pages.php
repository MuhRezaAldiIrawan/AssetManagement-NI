<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pages extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    //Activity Controllers
    public function toll()
    {
        return view('pages.activity.toll');
    }

    public function nontoll()
    {
        return view('pages.activity.nontoll');
    }

    public function pengembangan()
    {
        return view('pages.activity.pengembangan');
    }

    public function activitydetail()
    {
        return view('pages.activity.subpages.activitydetail');
    }

    //End Activity Controllers

    //Location Controllers
    public function location()
    {
        return view('pages.location');
    }

    //End Location Controllers

    //Kategori Controllers
    public function kategori()
    {
        return view('pages.kategori');
    }

    //End Kategori Controllers


    //User Controllers
    public function user()
    {
        return view('pages.user');
    }

    //End User Controllers


    //Pengembangan Controllers

    //End Pengembangan Controllers
    
}
