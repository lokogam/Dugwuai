@include('layouts.heder')

<main class="content">
    
    <div class="container-fluid p-0">

        <div class="center">
            @include('posts.nav')
            <br>

            <div class="text-center ">
                <div class="mb-3">
                    <h1 class="uppercase h3 d-inline align-middle">Etiqueta {{ $tag->name }}</h1>
                    <br />
                </div>
            </div>
            <br>
            @include('posts.post')
        </div>
    </div>

</main>
			
@include('layouts.footer')