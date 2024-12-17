@extends('/layouts/main')

@push('head')
    <title>Update</title>
@endpush

@section('body-section')

<div class="row">
    <div class="col-8 offset-2">
        <br>
        <h1>Edit Your Listing</h1>
        <form method="post" action="/list/{listing_id}/update?_method=put" class="needs-validation" novalidate enctype="multipart/form-data">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="Airbnb home" class="form-control" required> 
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required>Lorem ipsum dolor sit amet.</textarea>
            </div>

            <div class="mb-3">
                <p>Original image</p>
                <img class="w-25 rounded-2" src="https://a0.muscache.com/im/pictures/0f1d3850-0c9a-4930-86b2-4467619714f5.jpg?im_w=1920" alt="">
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">New Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" value="100" class="form-control" required>
            </div>
           
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" value="Lahore" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" value="Pakistan" class="form-control" required>
            </div>
            
            <button class="btn mb-3 edit-btn">Edit</button>
        </form>
    </div>
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