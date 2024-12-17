<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    // Display all listings
    public function index()
    {
        $listings = Listing::all(); // Fetch all listings
        return view('home', compact('listings')); // Pass data to the home view
    }

    public function create()
    {
        return view('new'); // Your 'new listing' page
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'country' => 'required|string',
        ]);

        // Handle file upload if there is an image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('listings', 'public');
        }

        // Add the user_id to the validated data
        $validated['user_id'] = auth()->id();

        // Save the listing to the database
        Listing::create($validated);

        return redirect()->route('home')->with('success', 'Listing added successfully!');
    }

    public function show($id)
    {
        $listing = Listing::findOrFail($id); // Fetch the specific listing
        $isOwner = Auth::check() && Auth::user()->id === $listing->user_id; // Check if the logged-in user is the owner
        return view('show', compact('listing', 'isOwner')); // Pass data to the show view
    }
    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);

        // Check if the logged-in user is the owner
        if (Auth::user()->id !== $listing->user_id) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this listing.');
        }

        // Delete the listing
        $listing->delete();
        return redirect()->route('home')->with('success', 'Listing deleted successfully!');
    }
    public function edit($id)
{
    $listing = Listing::findOrFail($id); // Fetch the listing by ID
    $isOwner = Auth::check() && Auth::user()->id === $listing->user_id; // Check if the logged-in user is the owner

    // If the user is not the owner, redirect them back
    if (!$isOwner) {
        return redirect()->route('home')->with('error', 'You are not authorized to edit this listing.');
    }

    return view('update', compact('listing')); // Return the edit view with the listing data
}

public function update(Request $request, $id)
{
    $listing = Listing::findOrFail($id); // Find the listing by ID

    // Check if the logged-in user is the owner of the listing
    if (Auth::user()->id !== $listing->user_id) {
        return redirect()->route('home')->with('error', 'You are not authorized to update this listing.');
    }

    // Validate the request data
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'price' => 'required|numeric',
        'location' => 'required|string',
        'country' => 'required|string',
    ]);

    // Handle file upload if there is a new image
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($listing->image) {
            Storage::delete('public/' . $listing->image);
        }

        // Store the new image
        $validated['image'] = $request->file('image')->store('listings', 'public');
    } else {
        // If no image is uploaded, retain the current image
        $validated['image'] = $listing->image;
    }

    // Update the listing with the validated data
    $listing->update($validated);

    return redirect()->route('listing.show', $listing->id)->with('success', 'Listing updated successfully!');
}

}
