@extends('/layouts/main')

@push('head')
    <title>Signup</title>
@endpush

@section('body-section')
   
<!-- Signup Form -->
<div class="container flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card p-4 col-12 col-md-6 col-lg-4 m-5">
        <h3 class="text-center mb-4" style="color: #FF385C;">Sign Up for Airbnb</h3>
        <form method="post" action="{{ route('user.register') }}" class="needs-validation" novalidate>
            @csrf  <!-- Add CSRF token -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                <div class="text-danger">
                    @error('username')
                    {{$message}}
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                <div class="text-danger">
                    @error('username')
                    {{$message}}
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                <div class="text-danger">
                    @error('password')
                    {{$message}}
                @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                <div class="text-danger">
                    @error('password_confirmation')
                    {{$message}}
                @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-airbnb w-100 edit-btn">Sign Up</button>
        </form>
        
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Footer -->
<footer class="mt-auto">
    <div class="container">
        <div class="f-info text-center">
            <div class="f-info-social">
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-square-github"></i>
            </div>
            <div class="f-info-brand">&copy; Airbnb Private Limited</div>
            <div class="f-info-links">
                <a href="/#">Privacy</a>
                <a href="/#">Terms</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
@endsection
