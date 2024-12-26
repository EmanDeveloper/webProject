@extends('/layouts/main')

@push('head')
    <title>Add your Airbnb listing</title>
@endpush

@section('body-section')
    @auth
        <div class="row">
            <div class="col-8 offset-2">
                <br>
                <h1>Add Your Listing</h1>
                <form method="post" action="{{ route('listings.store') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" value="" class="form-control" required> 
                    </div>
                    <div class="text-danger">
                        @error('title')
                        {{$message}}
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="text-danger">
                        @error('description')
                        {{$message}}
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="text-danger mb-2">
                    <span>jpeg,png,jpg,gif allow image</span>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" value="" class="form-control" required>
                    </div>
                    <div class="text-danger">
                        @error('price')
                        {{$message}}
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" value="" class="form-control" required>
                    </div>
                    <div class="text-danger">
                        @error('location')
                        {{$message}}
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" value="" class="form-control" required>
                    </div>
                    <div class="text-danger">
                        @error('country')
                        {{$message}}
                    @enderror
                    </div>

                    <button class="btn mb-3 edit-btn">Add listing</button>
                </form>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            You need to be logged in to add a listing.
        </div>
    @endauth
@endsection
