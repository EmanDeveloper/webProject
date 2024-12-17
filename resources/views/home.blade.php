@extends('/layouts/main')

@section('body-section')

<h1>All Listings</h1>

<div class="row">
    @foreach($listings as $listing)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/' . $listing->image) }}" class="card-img-top" alt="{{ $listing->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $listing->title }}</h5>
                    <p class="card-text">{{ $listing->description }}</p>
                    <p><strong>Price:</strong> ${{ $listing->price }}</p>
                    <p><strong>Location:</strong> {{ $listing->location }}, {{ $listing->country }}</p>
                    <a href="{{ route('listing.show', $listing->id) }}" class="btn btn-primary">View Listing</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
