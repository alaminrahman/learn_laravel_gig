<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Redis;

class ListingController extends Controller
{
    public function index(Request $request)
    {
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
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorize action');
        }

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

       $formFields['user_id'] = auth()->id();

       Listing::create($formFields);

       return redirect('/')->with(['message' => 'Successfully save!']);

    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorize action');
        }

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

            return redirect('/')->with(['message' => 'Successfully update!']);
      
    }

    public function delete(Listing $listing)
    {       
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorize action');
        }
        
        $listing->delete();

        if($listing->logo != null){
            $logo_array = explode('logos/', $listing->logo);

            if(! file_exists($logo_array[1])){
                unlink(public_path('storage/logos/' . $logo_array[1]));
            }
        }

        return redirect('/')->with(['message' => 'Successfully delete!']);
    }

    public function manage()
    {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->paginate(10)
        ]);
    }
    
    //End
}
