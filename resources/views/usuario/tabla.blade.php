<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Usuarios</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">

                        <div class="row">
                            <div class="align-content-md-center">
                                <div class="card flex-fill">
                                    <div class="card-header">
    
                                        <h5 class="card-title mb-0">Usuarios registrados</h5>
                                    </div>

                                    
                                    <div class="card-body ">
                                        <div class="mb-3">
                                            @can('usuario.create')
                                            <a href="{{url('usuario/create');}}" class="btn btn-info">Agregar</a>
                                            @endcan
                                            
                                            @can('usuario.export',)
                                                <a href="{{url('usuario/export');}}" class="btn btn-success">Excel</a>
                                            @endcan
                                            @can('usuario.exportpdf')
                                            <a href="{{url('usuario/exportpdf');}}" class="btn btn-secondary">Pdf</a>
                                            @endcan

                                            <form action="{{url('usuario/inportar');}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="importa"  class="btn btn-outline-secondary text-uppercase mt-2 me-2">
                                                <button class="btn btn-success">Importar Usuarios</button>
                                            </form>

                                        </div>

                                    <table
                                    class="table table-striped table-hover" 
                                    {{-- class="table table-hover my-0" --}}
                                    >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                {{-- <th class="d-none d-xl-table-cell">Nonbre</th> --}}
                                                <th class="">Nonbre</th>
                                                <th class="">Correo</th>
                                                <th class="">Rol</th>
                                                <th class="">foto</th>
                                                @can('usuario.edit' )
                                                <th class="">Assignee</th>
                                                @endcan
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th>{{$user->id}}</th>
                                                    <th>{{$user->name}}</th>
                                                    <th>{{$user->email}}</th> 
                                                    <th>@if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $rolName)
                                                                <h5>{{$rolName }}</h5>
                                                            @endforeach
                                                        @endif
                                                    </th>
                                                    <th>
                                                        @if ($user->profile_photo_path)
                                                            <img class="rounded-circle" width="100" height="100"
                                                            src="{{asset('/storage/'.$user->profile_photo_path)}}" alt="{{ $user->name }}">
                                                        @else
                                                            <img class="rounded-circle" width="100" height="100"
                                                            src="{{$user->profile_photo_url}}" alt="{{ $user->name }}">
                                                        @endif

                                                    </th>
                                                    
                                                        @can('usuario.edit')
                                                        <th>
                                                            <div>
                                                                    <a href="{{url('/usuario/'.$user->id.'/edit');}}" class="btn btn-warning">Editar</a>

                                                                <form action="{{url('/usuario/'.$user->id);}}" method="post">
                                                                    @csrf
                                                                    {{method_field('DELETE')}}
                                                                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar este registro?')" value="Eliminar">
                                                                </form>
                                                            </div>
                                                            
                                                        </th>
                                                        @endcan
                                                    
                                                        
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer" >                             
                                    {{ $users->links()}}
                                </div>

                            </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
