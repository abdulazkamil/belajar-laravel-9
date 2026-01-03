<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function create()
    {
    return view('create_picture');
    }
}
