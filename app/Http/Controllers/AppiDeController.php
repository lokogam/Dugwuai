<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class AppiDeController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'booststrap';

    public function index()
    {
        $valI = 0;
        $valS = 5;

        $url = 'https://www.datos.gov.co/resource/rpmr-utcd.json';
        $paginacion = '?$limit='.$valS.'&$offset='.$valI.'&$order=nit_de_la_entidad';
        $datos = Http::get($url.$paginacion);
        $api= $datos->json();

        return view('rol/api/index',compact('api') );
        // return response()->json($api);
    }
}

// calve id
// 4z8u72ac36h27vbkgjfvvz5hg

// clave secreta
// 2bbrz359rc7t0y394en1ruviaviu83a8mv0o3ssgjw2fl6361v