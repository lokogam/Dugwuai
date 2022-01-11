<nav class="navbar navbar-expand navbar-light navbar-bg">
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li class="nav-item dropdown">
                <a class="h3 d-inline text-muted align-middle nav-link " href="{{ route('posts.index') }}" 
                    >Todos</a>
            </li>
            <li class="nav-item dropdown">
                <a class="h3 d-inline text-muted align-middle nav-link dropdown-toggle" 
                    data-bs-toggle="dropdown">Categorias</a>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{route('posts.category', $category);}}"> {{ $category->name }}</a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="h3 d-inline text-muted align-middle nav-link dropdown-toggle" 
                    data-bs-toggle="dropdown">Etiquetas</a>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach ($tags as $tag)
                        <a class="dropdown-item" href="{{route('posts.tag',$tag);}}"> {{ $tag->name }}</a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>
<br>