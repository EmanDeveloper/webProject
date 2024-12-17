<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-compass"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                <a class="nav-link hover-effect" href="{{ route('home') }}">Home</a>
            </div>
            <div class="navbar-nav ms-auto">
                
                @auth
                <a class="nav-link air-bnb" href="{{ route('listings.create') }}">Airbnb your home</a>
                    <!-- If user is logged in, show Login button -->
                    <a class="nav-link btn edit-btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Logout</b></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @else
                    <!-- If user is not logged in, show Signup button -->
                    
                    <a class="nav-link active edit" href="{{ route('signup') }}"><b>Signup</b></a>
                    <a class="nav-link btn edit-btn" href="{{ route('login') }}"><b>Login</b></a>
                @endauth
            </div>
        </div>
    </div>
</nav>
