<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Nombre</h5>
            </div>
            <div class="card-body">
                <input type="text" name="name" id="name" class="form-control" value="{{old('name',$user->name)}}"  placeholder="Escribe tu nombre" />
                <div class="text-danger" >
                    {{$errors->first('name')}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Correo</h5>
            </div>
            <div class="card-body">
                <input type="email" name="email" id="email" class="form-control" value="{{old('email',$user->email) }}"  placeholder="Escribe tu correo" />
                <div class="text-danger" >
                    {{$errors->first('email')}}
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Rol</h5>
            </div>
            <div class="card-body">
                @foreach ($roles as $id => $rol)
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox"name="roles[]"  
                            value="{{ $id }}"
                            {{ $user->roles->contains($id) ? 'checked' : '' }}>
                        <span class="form-check-label">
                            {{$rol}}
                        </span>
                    </label>
                @endforeach
                <div class="text-danger" >
                    {{$errors->first('roles')}}
                </div>
            </div>
        </div>
    </div>
</div>



@if ($ruta == 'true')
    @can('usuario.create')
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contraseña</h5>
                    </div>
                    <div class="card-body">
                        <input type="password" name="password" id="password" class="form-control" value="{{old('password',$user->password) }}"  placeholder="Escribe una contraseña" />
                        <div class="text-danger" >
                            {{$errors->first('password')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endif

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card" >
            <div class="card-header">
                <h5 class="card-title mb-0" >Photo</h5>
            </div>
            <div class="card-body">
                <div class="mt-2" >
                    @if ($ruta != 'true')
                        @if ($user->profile_photo_path)
                            <img class="rounded-circle" width="100" height="100"
                            src="{{asset('/storage/'.$user->profile_photo_path)}}" alt="{{ $user->name }}">
                        @else
                            <img class="rounded-circle" width="100" height="100"
                            src="{{$user->profile_photo_url}}" alt="{{ $user->name }}">
                        @endif
                    @endif
                <input type="file" name="photo" id="photo" class="btn btn-outline-secondary text-uppercase mt-2 me-2" />
                </div>
                <div class="text-danger" >
                    {{$errors->first('photo')}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card-body ">
    <div class="mb-3">
        <input type="submit" class="btn btn-info"  value="Guardar">
        <a href="{{url('usuario/');}}" class="btn btn-secondary">Regresar</a>
    </div>
</div>







