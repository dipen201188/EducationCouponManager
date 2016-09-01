<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SchoolController extends Controller
{
    public function index()
    {
        return view('manage_school');
    }

    public function add()
    {
        return view('add_school');
    }

    public function manage()
    {
        return view('manage_school');
    }
}
