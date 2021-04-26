<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('monitoring');
    }
}
