@include('layouts.heder')

<main class="content">
    <div class="container-fluid p-0">
        @include('posts.nav')
        <br>

        <div class="d-flex align-items-start">
            @if ($post->user->profile_photo_path)
                <img class="rounded-circle me-2" width="66" height="66"
                src="{{asset('/storage/'.$post->user->profile_photo_path)}}" alt="{{ $post->user->name }}">
            @else
                <img class="rounded-circle me-2" width="66" height="66"
                src="{{$post->user->profile_photo_url}}" alt="{{ $post->user->name }}">
            @endif

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">{{ $post->user->name }}</h1>
                <br />
                <small class="text-muted">Today 5:12 pm</small>
            </div>
            
        </div>
        <br>

        <div class="row">
            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $post->name }}</h5>
                    </div>
                    <div class="card-body h-100">

                        <div class="row">
                            <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                                <div class="card flex-fill w-100">
                                    
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                                <div class="card flex-fill w-100">
                                    
                                    <div class="card-body px-4">
                                        <img class="card-img-top" 
                                                src="{{asset('/storage/'.$post->image->url)}}"
                                                    width="60" height="60" alt="Unsplash">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                                <div class="card flex-fill">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="card-header">
                                <h5 class="card-title mb-0">{{ $post->extract }}</h5>
                                <div class="border  text-muted p-2 mt-1">
                                    {{ $post->body }}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <h5 class="card-title"><font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Categoria</font></font></h5>
                                        </div>
                                        <div class="col-10">
                                            {{-- <a class="btn btn-warning" href="{{route('posts.category', $post->category);}}">{{ $post->category->name }}</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                        <h5 class="card-title"><font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Etiquetas</font></font></h5>
                                    <div class="card-body text-center">
                                        <div>
                                            @foreach ($post->tags as $tag)
                                                <a class="btn btn-info " href="{{ route('posts.tag', $tag); }}">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Similares</h5>
                    </div>

                    <div class="px-2">
                        <h5 class="h6 card-title">{{ $post->category->name }}</h5>
                    </div>
                    @foreach ($similares as $similar)
                        <a class="flex" href="{{ route('posts.show', $similar) }}">
                            <div class="px-3 mb-3">
                                <h5 class="card-title mb-0">¨{{ $similar->name }}</h5>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-xxl-1 d-flex order-2 order-xxl-3"></div>
                                <div class="col-12 col-md-12 col-xxl-10 d-flex order-3 order-xxl-2">
                                    <div class="card flex-fill w-100">
                                        <div class="card-body px-4">
                                            <img class="card-img-top" 
                                                    src="{{asset('/storage/'.$similar->image->url)}}"
                                                        width="60" height="60" alt="Unsplash">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xxl-1 d-flex order-1 order-xxl-1"></div>
                            </div>
                        </a>
                    
                    <hr class="my-3" />

                    @endforeach
                </div>
            </div>


        </div>

    </div>
</main>

@include('layouts.footer')