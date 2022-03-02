<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class AppiDeController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'booststrap';

    public function index(Request $request)
    {
        $valIn  = $request->input('valI');
        $url = 'https://www.datos.gov.co/resource/rpmr-utcd.json';
        $valS = 10;

        
        if($request->input('paginate') && $request->input('paginate') == 2){
            $valI = $valIn;
            $paginacion = '?$limit='.$valS.'&$offset='.$valI.'&$order=nit_de_la_entidad';
            $datos = Http::get($url.$paginacion);
            $api= json_decode($datos);
            return view('rol/api/table',compact('api','valI', 'valS') );

        }else if($request->input('paginate') && $request->input('paginate') == 1){
            $valI =$valIn;
            $paginacion = '?$limit='.$valS.'&$offset='.$valI.'&$order=nit_de_la_entidad';
            $datos = Http::get($url.$paginacion);
            $api= json_decode($datos);
            return view('rol/api/table',compact('api','valI', 'valS') );

        }else{
            $valI =0;
            $paginacion = '?$limit='.$valS.'&$offset='.$valI.'&$order=nit_de_la_entidad';
            $datos = Http::get($url.$paginacion);
            $api= json_decode($datos);

            return view('rol/api/index',compact('api','valI', 'valS') );
        }

        // return response()->json($api);
    }
}

// print_r($api);
// exit();
// calve id
// 4z8u72ac36h27vbkgjfvvz5hg

// clave secreta
// 2bbrz359rc7t0y394en1ruviaviu83a8mv0o3ssgjw2fl6361v