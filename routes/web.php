<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// If we create modal we can use find and filtering
// All Listings
Route::get('/', function () {
    // Send data to listings page
    return view('listings', [
        //'heading' => 'Latest Listings',
        'listings' => Listing::all() // :: to get function
    ]
    );

    // Using controller 
    
});

// Single Listing

// Route::get('/listing/{id}', function($id){
//     $listing = Listing::find($id);

//     if($listing){
//         return view('listing', [
//             'heading' => 'Single Listing',
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }

// });

// Route Model Binding // it will auto throw exception
Route::get('/listing/{listing}', function(Listing $listing){

    return view('listing', [
       // 'heading' => 'Single Listing',
        'listing' => $listing
    ]);

    // Using controller 

});



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return response('<h1>Welcome!</h1>', 200)
//     -> header('Content-Type', 'text/plain')
//     -> header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {  
//     //dd($id); // Die Dump helper for debugging purposes
//     ddd($id); // Die Dump debug helper for debugging purposes more info
//     return response('Post:' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     // http://127.0.0.1:8000/search?name=fidaa&city=ahsa
//     //dd($request->name . ' ' . $request->city);
//     return $request->name . ' ' . $request->city;

// });

// Route::get('/search2', function () {
//     return request()->name . ' ' . request()->city;

// });
