<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\MotorCar;
use Auth;
use PDF;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$train = Train::find(Auth::user()->id_train);
        return view('dashboard', ["train" => $train]);
    }

    public function printPdf() {
        $train = Train::find(Auth::user()->id_train);

        $data = [
            'train' => $train,
            'data' => MotorCar::where(['id_train' => Auth::user()->id_train])
                ->limit(100)
                ->get(),
        ];

        $pdf = PDF::loadView('pdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('report_lrt_'.$train->id.'.pdf');
    }
}
