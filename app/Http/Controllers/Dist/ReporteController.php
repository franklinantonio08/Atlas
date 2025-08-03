<?php

namespace App\Http\Controllers\Dist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Solicitud;
use App\Models\Colaboradores;
use App\Models\Cubiculo;
use App\Models\Motivo;
use App\Models\Submotivo;
use App\Models\Consumidor;
use App\Models\Departamento;

use DB;
use Excel;

class ReporteController extends Controller
{
    private $request;
    private $common;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function Atencion(){
        
     

        // return view('dist.reportes.atencion', compact( 'resumen'));
        return view('dist.reportes.atencion');

    }

}
