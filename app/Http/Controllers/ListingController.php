<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index() {
        return view('listings', [
            //'heading' => 'Latest Listings',
            'listings' => Listing::all() // :: to get function
        ]
        );
    }

    //Show single listing
    public function show(Listing $listing){
        return view('listing', [
            // 'heading' => 'Single Listing',
             'listing' => $listing
         ]);

    }
}
