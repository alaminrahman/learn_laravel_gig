<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        // dd(request('tag'));

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag']))->get(),
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }
    
    //End
}
