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
}
