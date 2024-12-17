@extends('/layouts/main')

@push('head')
    <title>Show Listing</title>
@endpush

@section('body-section')

<div class="container">
    <div class="row mt-3">
        <div class="col-lg-8 col-md-10 col-12 mx-auto">
            <h1>{{ $listing->title }}</h1>
        </div>
        <div class="card border-0 col-lg-6 col-md-8 col-12 mx-auto mt-3">
            <img class="mt-2 rounded-2" src="{{ asset('storage/' . $listing->image) }}" alt="Listing Image">
            <div class="card-body">
                <p class="card-text">
                    <b><i>Owner's Username: {{ $listing->owner->name }}</i></b><br>
                    {{ $listing->description }}<br>
                    <strong>Price:</strong> RS {{ $listing->price }}<br>
                    <strong>Location:</strong> {{ $listing->location }}<br>
                    <strong>Country:</strong> {{ $listing->country }}
                </p>
            </div>
        </div>
    </div>

    <!-- Only show these buttons if the current user is the listing owner -->
    @if ($isOwner)
        <div class="row mt-3 mb-3">
            <div class="col-lg-8 col-md-10 col-12 mx-auto d-flex justify-content-between">
                <a href="{{ route('listing.edit', $listing->id) }}" class="btn edit-btn">Edit</a>
                <form method="POST" action="{{ route('listing.destroy', $listing->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-dark">Delete</button>
                </form>
            </div>
        </div>
    @endif
</div>

<footer class="mt-5">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

@endsection
