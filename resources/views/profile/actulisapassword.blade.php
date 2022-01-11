



@include('layouts.heder')

<main class="content">

    <h1 class="h3 mb-3">Cambiar Contraseña</h1>
        

    <form action="{{url('profile');}}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Contraseña actual</h5>
                    </div>
                    <div class="card-body">
                        <input type="password" name="current_password" id="current_password" class="form-control"   placeholder="Escribe la contaseña actual" />
                        <div class="text-danger" >
                            {{$errors->first('current_password')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Nueva contraseña</h5>
                    </div>
                    <div class="card-body">
                        <input type="password" name="password" id="password" class="form-control"   placeholder="Escribe la contraseña nueva" />
                        <div class="text-danger" >
                            {{$errors->first('password')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Confirma contraseña</h5>
                    </div>
                    <div class="card-body">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"   placeholder="Escribe la contraseña nueva" />
                        <div class="text-danger" >
                            {{$errors->first('password_confirmation')}}
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="card-body ">
            <div class="mb-3">
                <input type="submit" class="btn btn-info"  value="Guardar">
                <a href="{{url('/dashboard');}}" class="btn btn-secondary">Regresar</a>
            </div>
        </div>

    </form>
</main>

@include('layouts.footer')