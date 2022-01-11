
@include('layouts.heder')

<main class="content">
    
    <div class="container-fluid p-0">

        <div class="center">

        @include('posts.nav')

        @include('posts.post')
        </div>
    </div>

</main>

@include('layouts.footer')