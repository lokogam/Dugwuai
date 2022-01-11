

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Roles</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">

                        <div class="row">
                            <div class="align-content-md-center">
                                <div class="card flex-fill">
                                    <div class="card-header">
    
                                        <h5 class="card-title mb-0">Roles registrados</h5>
                                    </div>

                                    <div class="card-body ">
                                        <div class="mb-3">
                                            <a href="{{url('rol/create');}}" class="btn btn-info">Agregar</a>
                                            
                                        </div>

                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th class="d-none d-xl-table-cell">Nonbre</th>
                                                <th class="d-none d-xl-table-cell">Permisos</th>
                                                <th class="d-none d-md-table-cell">Assignee</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <th>{{$role->id}}</th>
                                                    <th>{{$role->name}}</th>
                                                    <th>@if (!empty($role->permissions->pluck('descripcion')))
                                                            @foreach ($role->permissions->pluck('descripcion') as $permisoName)
                                                                <h5>{{$permisoName }}</h5>
                                                            @endforeach
                                                        @endif
                                                    </th>
                                                    <th>
                                                        <div>
                                                                <a href="{{url('/rol/'.$role->id.'/edit');}}" class="btn btn-warning">Editar</a>

                                                            <form action="{{url('/rol/'.$role->id);}}" method="post">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                                <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar este rol?')" value="Eliminar">
                                                            </form>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

			
