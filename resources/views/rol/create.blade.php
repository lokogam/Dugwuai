@include('layouts.heder')

<main class="content">

        <h1 class="h3 mb-3">Agregar Rol</h1>
        

        <form action="{{url('/rol');}}" method="post" >
          

            @csrf

            @include('rol.formulario')

        </form>
        

</main>

@include('layouts.footer')