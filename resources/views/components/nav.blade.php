<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        @if(Auth::user()->type == "admin")
        <a class="navbar-brand" href="{{route('index')}}">Projects Management</a>
        @else
        <a class="navbar-brand" href="{{route('home')}}">Main Page</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @if(Auth::user()->type == "admin")
                    <a class="nav-link active" aria-current="page" href="{{route('developersPages.myProjects')}}">MyProjects</a>
                    @else
                    <a class="nav-link active" aria-current="page" href="{{route('developersPages.myProjects')}}">My Project</a>
                    @endif
                </li>
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Links
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100037663337235"">Facebook Account</a></li>
                        <li><a class=" dropdown-item" href="#">Twaiter Account</a></li>
                        <li>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->type == "admin")
                        <li><a class="dropdown-item" href="{{route('create')}}">Create Project</a></li>
                        <li><a class="dropdown-item" href="{{route('trash')}}">Projects Trash</a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('notifications')}}">notifications</a></li>
                    </ul>
                </li>
                {{--
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                --}}
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
            </form>
            <form class="d-flex" method="post" action="{{route('logout')}}">
                @csrf
                <button class="btn btn-outline-danger" type="submit">log out</button>
            </form>
        </div>
    </div>
</nav>