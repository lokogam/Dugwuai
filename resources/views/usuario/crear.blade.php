
@include('layouts.heder')

<main class="content">

        <h1 class="h3 mb-3">Agregar Usuario</h1>
        

        <form action="{{url('/usuario');}}" method="post" enctype="multipart/form-data">
          

            @csrf

            @include('usuario.formulario')

        </form>
        

</main>

@include('layouts.footer')