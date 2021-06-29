<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotorCar;
use App\Models\Motor;
use App\Models\Trailer;

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
    	$data = MotorCar::where(['id_train' => $request->id])
        ->orderBy('id', 'DESC')
        ->first();
        return $data;
    }

    public function getAllMotorCar(Request $request){
        $data = MotorCar::where(['id_train' => $request->id])
        ->orderBy('id', 'DESC')
        ->offset(0)
        ->limit(10)
        ->get();
        return $data;
    }

    public function getMotor(Request $request){
        $data = Motor::where(['id_train' => $request->id])
        ->first();
        return $data;
    }

    public function getTrailer(Request $request){
        $data = Trailer::where(['id_train' => $request->id])
        ->first();
        return $data;
    }
}
