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
        return View('rol/api/index');
    }



    // public function getContratacion(Request $request)
    // {

    //     $nivel_entidad   = $request->input('nivel_entidad');
    //     $source   = $request->input('source');
    //     $pagina =$request->input('pag');

    //     $filtros = "";
        
    //     if (isset($source) && !empty($source)) {
    //         $filtros .= "&source=" . $source;
    //     }

    //     if (isset($nivel_entidad) && !empty($nivel_entidad)) {
    //         $filtros .= "&nivel_entidad=" . $nivel_entidad;
    //         // $filtros .= "&estado_del_proceso=Activo";
    //     }   

    //     $paginacion = '&$limit=100&$offset=' . $pagina . '&$order=nit_de_la_entidad';

    //     if ($request->input('filtro') ||$request->input('pag')) {
    //         $paginacion = '&$limit=100&$offset=' . $pagina . '&$order=nit_de_la_entidad';  
    //     }        

    //     $selp = '&$select=count(nit_de_la_entidad)';
    //     $url = 'https://www.datos.gov.co/resource/rpmr-utcd.json?$$app_token=LtsohJslsewBjbllw3kep7R42';

    //     // $url_cont = 'https://www.datos.gov.co/resource/rpmr-utcd.json?$$app_token=LtsohJslsewBjbllw3kep7R42';

    //     $contador = json_decode(file_get_contents($url . $filtros .$selp));
        
    //     $res = json_decode(file_get_contents($url . $filtros . $paginacion));


    //     if ($request->input('filtro') ||$request->input('pag')) {
    //         return View('rol/api/table')
    //             ->with('datos', $res)
    //             ->with('contador', $contador);
    //     }

    //     return View('rol/api/index');
    //         ->with('datos', $res)
    //         ->with('contador', $contador);

    // }
}

// print_r($api);
// exit();
// calve id
// 4z8u72ac36h27vbkgjfvvz5hg

// clave secreta
// 2bbrz359rc7t0y394en1ruviaviu83a8mv0o3ssgjw2fl6361v

// var filtro = [
//     if (nivel_entidad != "") {
//         "nivel_entidad" : nivel_entidad,
//     },
// ]