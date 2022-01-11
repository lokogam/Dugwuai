<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class UsuarioController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'booststrap';

    public function __construct()
    {
        $this->middleware('can:usuario.index')->only('index');
        $this->middleware('can:usuario.create')->only('create');
        $this->middleware('can:usuario.edit')->only('edit');
        $this->middleware('can:usuario.destroy')->only('destroy');
    }


    public function index()
    {
        $datos =[
            'users'=> User::paginate(10),
            'roles'=> Role::all()
        ];
        return view('usuario.index',$datos);
    }



    public function create()
    {
        $datos =[
            'user' => new User,
            'roles'=> Role::pluck('name','id')->all(),
            'ruta' => request()->routeIs('usuario.create')
        ];
        return view('usuario.crear',$datos);
        
    }


    public function store(Request $request)
    {
        $campos=[
            'name'=>'required|string',
            'email'=>'required|email',
            'roles'=>'required',
            'photo'=>'image'
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $input= $request->except('_token');
        $input['password']=bcrypt($request->password);
        
        $user = User::create($input);
        
        $user->assignRole($request->input('roles'));

        
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
            
        }

        // return response()->json($user);
        
        return redirect('usuario');
    }


    public function show()
    {
        $user = auth()->user();
        $roles = Role::all()->pluck('name','id');
        
        $posts = Post::where('user_id', $user->id)   
                            ->where('status',2)
                            ->latest('id')
                            ->paginate(2);
        return view('perfil.index',compact('user','roles','posts'));
        // return response()->json($posts);
    }


    public function edit($id)
    {
        $roles = Role::all()->pluck('name','id');
        $user = User::findOrFail($id);
        $user->load('roles');
        $ruta = request()->routeIs('usuario.create');
        return view('usuario.edit',compact('user','roles','ruta'));
        
    }


    public function update(Request $request, $id)
    {
    
        $campos=[
            'name'=>'required|string',
            'email'=>'required|email',
            'roles'=>'required',
            
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        $this->validate($request, $campos, $mensaje);

        $user = $request->except('_token','_method','password');

        $input= $request->all();
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        return redirect('usuario');

        // return response()->json($input);
    }

    
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('usuario');
    }

}
  



