@extends('/layouts/main')

@section('body-section')

<div class="container">
    <div class="head mt-4">
        <h1 class="all-list">All listings</h1>
        <div class="text-togle">
            <div class="form-check-reverse form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Display total after taxes</label>
            </div>
        </div>
    </div>

    <!-- Use proper row and column classes to ensure three cards per row on large screens -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4 ">
        @foreach($listings as $listing)
            <div class="col mb-4">
                <a href="{{ route('listing.show', $listing->id) }}" class="card list-card h-100 border-0 shadow-sm card-hover">
                    <img src="{{ asset('storage/' . $listing->image) }}" class="card-img-top" alt="{{ $listing->title }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $listing->title }}</h5>
                        <div class="mt-auto">
                            <p class="mb-2"><strong>Price:</strong> ${{ $listing->price }} <i class="tex-info">&nbsp; +10% GST</i></p>
                            <p class="mb-3"><strong>Location:</strong> {{ $listing->location }}, {{ $listing->country }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>


<script>
    let pricetogel = document.getElementById("flexSwitchCheckDefault");
    pricetogel.addEventListener("click", () => {
        let text_info = document.getElementsByClassName("tex-info");
        for (let info of text_info) {
            info.style.display = info.style.display !== "inline" ? "inline" : "none";
        }
    });
</script>

@endsection
