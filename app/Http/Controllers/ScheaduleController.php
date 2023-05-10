<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheaduleController extends Controller
{
    public function scheadule(Request $request)
    {
        $title = 'MUN | Scheadule';

        return view('pages.scheadule.scheadule', compact('title'));
    }
}
