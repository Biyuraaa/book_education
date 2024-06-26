<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('welcome')}}">BookEdukasi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Updated Navigation with Tab Bars -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('libraries.index')}}">Library</a></li>
            </ul>
            <!-- Updated Tab Bars -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::user() == null)
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="{{route('carts.index')}}"><i class="bi bi-cart"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('profile.index')}}">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                @endif
            </ul>
            <form class="d-flex">
            </form>
        </div>
    </div>
</nav>