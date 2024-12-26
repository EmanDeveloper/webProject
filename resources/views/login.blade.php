@extends('/layouts/main')

@push('head')
    <title>Login</title>
@endpush

@section('body-section')


<div class="container flex-grow-1 d-flex align-items-center justify-content-center mt-4 mb-4">
    <div class="card p-4 col-12 col-md-6 col-lg-4">
        <h3 class="text-center mb-4" style="color: #FF385C;">Login to Airbnb</h3>
        <form method="post" action="{{ route('user.login') }}" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                <div class="text-danger">
                    @error('email')
                    {{$message}}
                @enderror
                </div>
            
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                <div class="text-danger">
                    @error('email')
                    {{$message}}
                @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-airbnb w-100 edit-btn">Login</button>
            <div class="text-center mt-3">
                <small>Don't have an account? <a href="./signup.html" style="color: #FF385C;">Sign up</a></small>
            </div>
        </form>
    </div>
</div>

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