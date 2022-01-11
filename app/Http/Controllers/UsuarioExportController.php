<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuarioExport;
use App\Imports\UserImport;

use Barryvdh\DomPDF\Facade as PDF;

class UsuarioExportController extends Controller
{
    public function export()
    {
        $userExport = new UsuarioExport;
        return $userExport->download('users.xlsx');
        // return 'DESCARGADO';
    }

    public function exportpdf()
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>hola mundo</h1>');
        // return $pdf->stream();
        $userExport = new UsuarioExport;
        return $userExport->download('users.pdf');
        
        // $pdf = PDF::loadView('usuario.tabl' );
        // return $pdf->download('invoice.pdf');

    }

    public function inportar(Request $request)
    {
        $importa = $request->file('importa');
        Excel::import(new UserImport,$importa );
        return redirect('usuario');
    }
}
