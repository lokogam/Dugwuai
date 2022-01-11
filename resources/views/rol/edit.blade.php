@include('layouts.heder')

<main class="content">

    <h1 class="h3 mb-3">Editar Rol</h1>
    

    <form action="{{url('/rol/'.$role->id);}}" method="post">

        @csrf
        {{method_field('PATCH')}}

        @include('rol.formulario')

    </form>
    

</main>
			
@include('layouts.footer')