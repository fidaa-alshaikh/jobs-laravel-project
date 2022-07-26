<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class ListingController extends Controller
{
    //Show all listings
    public function index() {
        //request()->tag;
        $tag = request(['tag', 'search']);
        return view('listings.index', [
            //'heading' => 'Latest Listings',
            //'listings' => Listing::all() // :: to get function
            //'listings' => Listing::latest()->get() // same as all but get the latest first
            //simplePaginate // only next and pervious 
            'listings' => Listing::latest()->filter($tag)->paginate(4)
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

    //Show create listing form
    public function create(){
        return view('listings.create');
    }

    //Store listing data
    // dependency injection Request $request
    public function store(Request $request){
        //$request->all() // display all info from form
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], // Rule::unique(form, field name)
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        //dd($formFields); // Associative array
        // Flash message stored in memory for one page load 
        //Session::flash('message', 'Listing created successfully');
        //'success', 'Listing created successfully'
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully'); 
    }
}
