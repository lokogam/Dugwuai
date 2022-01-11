<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuarioExport;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Livewire\WithPagination;





class RolController extends Controller
{
    
    public function index()
    {
        $datos =[
            'permissions'=> Permission::all(),
            'roles'=> Role::all()
        ]; 
        
        return view('rol.index', $datos);
    }

    
    public function create()
    {
        $datos =[
            'role' => new Role,
            'permissions'=> Permission::pluck('descripcion','id')->all()
        ];
        return view('rol.create', $datos);
    }

    
    public function store(Request $request)
    {
        $campos=[
            'name'=>'required|string',
            'permissions'=>'required',
            
        ];
        $mensaje=[
            // 'required'=>'El :attribute es requerido',
            'name'=>'El nombre es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        // $input= $request->all();
        // $role= Role::create($input);

        $role = Role::create(['name' => $request->input('name'),
                            'guard_name'=> 'web']);

        
        $role->permissions()->sync($request->permissions);

        return redirect('rol');
        // return response()->json($role);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        $permissions = Permission::all()->pluck('descripcion','id');
        $role = Role::findOrFail($id);
        $role->load('permissions');
    
        return view('rol.edit',compact('permissions', 'role') );
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'name'=>'required|string',
            'permissions'=>'required',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $input= $request->all();
        $role = Role::find($id);
        $role->update($input);

        // $role->syncPermissions($request->input('permissions'));
        $role->permissions()->sync($request->permissions);
        return redirect('rol');
    }

    
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect('rol');
    }
}
