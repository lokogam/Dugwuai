@include('layouts.heder')

<main class="content">

        <h1 class="h3 mb-3">Editar Usuario</h1>
        

        <form action="{{url('/usuario/'.$user->id);}}" method="post" enctype="multipart/form-data">


            @csrf
            {{method_field('PATCH')}}

            @include('usuario.formulario')

        </form>
        

</main>

@include('layouts.footer')