<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        // dd(request('tag'));

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
       $formFields = $request->validate([
        'company' => ['required', Rule::unique('listings', 'company')],
        'title' => 'required',
        'location' => 'required',
        'email' => ['required', 'email'],
        'website' => 'required',
        'tags' => 'required',
        'description' => 'required',
       ]);

       if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       Listing::create($formFields);

       return redirect('/')->with(['message' => 'Successfully save!']);

    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'company' => ['required'],
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
           ]);
    
           if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
                if($listing->logo != null){
                    $logo_array = explode('logos/', $listing->logo);

                    if(! file_exists($logo_array[1])){
                        unlink(public_path('storage/logos/' . $logo_array[1]));
                    }
                }
                
           }

           $listing->update($formFields);

            return back()->with(['message' => 'Successfully update!']);
      
    }

    public function delete(Listing $listing)
    {       

        $listing->delete();

        if($listing->logo != null){
            $logo_array = explode('logos/', $listing->logo);

            if(! file_exists($logo_array[1])){
                unlink(public_path('storage/logos/' . $logo_array[1]));
            }
        }

        return redirect('/')->with(['message' => 'Successfully delete!']);
    }
    
    //End
}
