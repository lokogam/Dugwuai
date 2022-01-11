

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Rol</h5>
            </div>
            <div class="card-body">
                <input type="text" name="name" id="name" class="form-control" value="{{old('name',$role->name)}}"  placeholder="Escribe el rol" />
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
                <h5 class="card-title mb-0">Permisos</h5>
            </div>
            <div class="card-body">
                @foreach ($permissions as $id => $permiso)
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox"name="permissions[]"  
                        value="{{ $id }} "
                        {{ $role->permissions->contains($id) ? 'checked' : '' }}
                        >
                        <span class="form-check-label">
                            {{$permiso}}
                        </span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card-body ">
    <div class="mb-3">
        <input type="submit" class="btn btn-info"  value="Guardar">
        <a href="{{url('rol/');}}" class="btn btn-secondary">Regresar</a>
    </div>
</div>

			
