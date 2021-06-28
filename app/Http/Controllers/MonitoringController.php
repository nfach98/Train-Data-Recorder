<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotorCar;

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

    public function getMotorCar(Request $request){
    	$motorCar = MotorCar::where(['id_train' => $request->id])
        ->first();
        return $motorCar;
    }
}
