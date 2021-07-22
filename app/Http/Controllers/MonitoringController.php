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

    public function index($type)
    {
        return view('monitoring', ["type" => $type]);
    }

    public function getMotorCar(Request $request){
    	// $data = MotorCar::where(['id_train' => $request->id])
     //    ->orderBy('id', 'DESC')
     //    ->first();
     //    return $data;

        $data = MotorCar::join('train', 'train.id', '=', 'db_motorcar.id_train')
        ->where(['db_motorcar.id_train' => $request->id])
        ->orderBy('db_motorcar.id', 'DESC')
        ->first();
        return $data;
    }

    public function getAllMotorCar(Request $request){
        $data = MotorCar::where(['id_train' => $request->id])
        ->limit(100)
        ->get();
        return $data;
    }

    public function getMotor(Request $request){
        $data = Motor::where(['id_train' => $request->id])
        ->limit(100)
        ->get();
        return $data;
    }

    public function getTrailer(Request $request){
        $data = Trailer::where(['id_train' => $request->id])
        ->limit(100)
        ->get();
        return $data;
    }
}
