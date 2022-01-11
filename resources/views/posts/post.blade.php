<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Post</h5>
    </div>
    <div class="card-body h-100">

        @foreach ($posts as $post)
            <div class="d-flex align-items-start">

                @if ($post->user->profile_photo_path)
                    <img class="rounded-circle me-2" width="36" height="36"
                    src="{{asset('/storage/'.$post->user->profile_photo_path)}}" alt="{{ $post->user->name }}">
                @else
                    <img class="rounded-circle me-2" width="36" height="36"
                    src="{{$post->user->profile_photo_url}}" alt="{{ $post->user->name }}">
                @endif
                <div class="flex-grow-1">
                    <small class="float-end text-navy">3h ago</small>
                    <strong>{{ $post->user->name }}</strong> 
                    <br />
                    <small class="text-muted">Today 5:12 pm</small>
                    <div class="mb-3">
                        <h1  class="h3 d-inline align-middle">
                            <a class="h3 d-inline text-muted align-middle" href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                        </h1>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <img class="card-img-top" 
                                    src="{{asset('/storage/'.$post->image->url)}}"
                                        width="60" height="60" alt="Unsplash">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">{{ $post->extract }}</h5>
                                </div>
                                <div class="card-body">
                                    <div class="border  text-muted p-2 mt-1">
                                        {{ $post->body }}
                                    </div>
                                    <br>
                                    <div class="card">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <h5 class="card-title"><font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">Categoria</font></font></h5>
                                            </div>
                                            <div class="col-10">
                                                {{-- <a class="btn btn-warning btn-sm" href="{{route('posts.category', $post->category);}}">{{ $post->category->name }}</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                            <h5 class="card-title"><font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Etiquetas</font></font></h5>
                                        <div class="card-body text-center">
                                            <div>
                                                @foreach ($post->tags as $tag)
                                                    <a class="badge bg-info me-1 my-1" href="{{ route('posts.tag', $tag); }}">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm"
                        data-feather="heart"></i> Like</a>
                </div>
            </div>

            <hr />
        @endforeach
        
        <div class="card-footer" >                             
            {{ $posts->links()}}
        </div>

    </div>
</div>