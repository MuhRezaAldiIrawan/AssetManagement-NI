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
    public function activity()
    {
        return view('pages.activity');
    }

    public function activitydetail()
    {
        return view('pages.detail.activitydetail');
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


    //Lognontol Controllers
    public function lognontol()
    {
        return view('pages.lognontol');
    }

    //End lognontol Controllers

    //Pengembangan Controllers
    public function pengembangan()
    {
        return view('pages.pengembangan');
    }

    //End Pengembangan Controllers
    
}
