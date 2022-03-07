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
        $jdatos = Http::get($url);
        $japi= json_decode($jdatos);
        
        $valS = 2;
        $numero = count($japi);

        
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

            return view('rol/api/index',compact('api','valI', 'valS', 'numero') );
        }

        // return response()->json($api);
    }



    public function getContratacion(Request $request)
    {
        $url = 'https://www.datos.gov.co/resource/rpmr-utcd.json?$$app_token=LtsohJslsewBjbllw3kep7R42';
        $res = json_decode(file_get_contents($url));
        // var_export ($res);
        $indice = array_search("nivel_entidad",$res,"Territorial");
        var_export ($indice);
        
        exit();

        $nivel_entidad   = $request->input('nivel_entidad');
        $source   = $request->input('source');
        $pagina =$request->input('pag');

        $filtros = "";
        
        if (isset($source) && !empty($source)) {
            $filtros .= "&source=" . $source;
        }

        if (isset($nivel_entidad) && !empty($nivel_entidad)) {
            $filtros .= "&nivel_entidad=" . $nivel_entidad;
            // $filtros .= "&estado_del_proceso=Activo";
        }   

        $paginacion = '&$limit=100&$offset=' . $pagina . '&$order=nit_de_la_entidad';

        if ($request->input('filtro') ||$request->input('pag')) {
            $paginacion = '&$limit=100&$offset=' . $pagina . '&$order=nit_de_la_entidad';  
        }        

        $selp = '&$select=count(nit_de_la_entidad)';
        $url = 'https://www.datos.gov.co/resource/rpmr-utcd.json?$$app_token=LtsohJslsewBjbllw3kep7R42';

        // $url_cont = 'https://www.datos.gov.co/resource/rpmr-utcd.json?$$app_token=LtsohJslsewBjbllw3kep7R42';

        $contador = json_decode(file_get_contents($url . $filtros .$selp));
        
        $res = json_decode(file_get_contents($url . $filtros . $paginacion));


        if ($request->input('filtro') ||$request->input('pag')) {
            return View('rol/api/table')
                ->with('datos', $res)
                ->with('contador', $contador);
                // ->with('content', 'container')
                // ->with('container', 'dashboard.continuada.contratacion')
                // ->with('menu_activo', 'Educacion Continuada')
                // ->with('submenu_activo', 'Contratacion');
        }

        return View('rol/api/index')
            ->with('datos', $res)
            ->with('contador', $contador);
            // ->with('content', 'container')
            // ->with('container', 'dashboard.continuada.contratacion')
            // ->with('menu_activo', 'Educacion Continuada')
            // ->with('submenu_activo', 'Contratación');
    }
}

// print_r($api);
// exit();
// calve id
// 4z8u72ac36h27vbkgjfvvz5hg

// clave secreta
// 2bbrz359rc7t0y394en1ruviaviu83a8mv0o3ssgjw2fl6361v