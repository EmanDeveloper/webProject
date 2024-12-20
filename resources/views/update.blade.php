@extends('/layouts/main')

@section('body-section')

<div class="row">
    <div class="col-8 offset-2">
        <br>
        <h1>Edit Your Listing</h1>


<form method="post" action="{{ route('listing.update', $listing->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- This is to ensure it's treated as a PUT request for updating -->

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value="{{ $listing->title }}" class="form-control" required> 
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ $listing->description }}</textarea>
    </div>

    <div class="mb-3">
        <p>Original image</p>
        <img class="w-25 rounded-2" src="{{ asset('storage/' . $listing->image) }}" alt="Listing Image">
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">New Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" value="{{ $listing->price }}" class="form-control" required>
    </div>
   
    <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" name="location" value="{{ $listing->location }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="country" value="{{ $listing->country }}" class="form-control" required>
    </div>
    
    <button class="btn mb-3 edit-btn">Update Listing</button>
</form>

</div>
</div>

@endsection
