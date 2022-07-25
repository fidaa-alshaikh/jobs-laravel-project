<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index() {
        return view('listings.index', [
            //'heading' => 'Latest Listings',
            'listings' => Listing::all() // :: to get function
        ]
        );
    }

    //Show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            // 'heading' => 'Single Listing',
             'listing' => $listing
         ]);

    }
}
