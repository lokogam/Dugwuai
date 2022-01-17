@include('layouts.heder')



<main class="content">
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detalles</h5>
                    </div>
                    <div class="card-body text-center">
                        @if (Auth::user()->profile_photo_path)
                        <img class="rounded-circle" width="128" height="128"
                            src="{{asset('/storage/'.Auth::user()->profile_photo_path)}}"
                            alt="{{ Auth::user()->name }}">
                        @else
                        <img class="rounded-circle" width="128" height="128" src="{{Auth::user()->profile_photo_url}}"
                            alt="{{ Auth::user()->name }}">
                        @endif
                        <h5 class="card-title mb-0">{{ Auth::user()->name }}</h5>
                        <div class="text-muted mb-2">Programador</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span>
                                Message</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Roles</h5>
                        @if (!empty(Auth::user()->getRoleNames()))
                                                            @foreach (Auth::user()->getRoleNames() as $rolName)
                                                                <h5 class="badge bg-primary me-1 my-1">{{$rolName }}</h5>
                                                            @endforeach
                                                        @endif
                        {{-- <a href="#" class="badge bg-primary me-1 my-1">HTML</a> --}}
                        
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a
                                    href="#">San Francisco, SA</a></li>

                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a
                                    href="#">GitHub</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a
                                    href="#">Boston</a></li>
                        </ul>
                    </div>

                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Elsewhere</h5>
                        <ul class="list-unstyled mb-0">
                            <li  class="mb-1 my-1" >
                                <a class="btn btn-info btn-sm my-1" href="#"><span data-feather="twitter"></span>
                                Twittezr</a>
                                <a class="btn btn-info btn-sm my-1" href="#"><span data-feather="facebook"></span>
                                    Facebook</a>
                                <a class="btn btn-info btn-sm my-1" href="#"><span data-feather="instagram"></span>
                                    Instagram</a>
                                <a class="btn btn-info btn-sm my-1" href="#"><span data-feather="linkedin"></span>
                                    LinkedIn</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>



            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Activities</h5>
                    </div>
                    <div class="card-body h-100">

                        <div class="mb-3">
                            <h1 class="h3 d-inline align-middle">Post</h1>
                        </div>

                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <img class="card-img-top" 
                                            src="{{asset('/storage/'.$post->image->url)}}"
                                            width="60" height="60" alt="Unsplash">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">{{ $post->name }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $post->extract }}</p>
                                            <div class="border  text-muted p-2 mt-1">
                                                {{ $post->body }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="card-footer" >                             
                        {{ $posts->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('layouts.footer')