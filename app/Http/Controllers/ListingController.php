<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //All listings
    public function index(Request $request)
    {
        return view('listings.index', ['listings' => Listings::latest()->filter(request(['tag', 'search']))->paginate(20)]);
    }
    //Show single listing
    public function show($id)
    {
        $listing = Listings::find($id);
        if ($listing) {
            return View('listings.show', ['listing' => $listing]);
        } else {
            abort(404);
        }
    }
    //Create Show listing Form
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email|Rule::unique("email")',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'image'
        ]);
        if ($request->hasFile('logo'))
        {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $data['user_id'] = auth()->id();
        Listings::create($data);
        return redirect('/')->with('message', 'Listing Created Successfully!');
    }
    //Edit Listings
    public function edit($id,Listings $listing)
    {
        $listing = Listings::find($id);
        if ($listing) {
            return View('listings.edit', ['listing' => $listing]);
        } else {
            abort(404);
        }
    }
    //Update listings
    public function update(Request $request,Listings $listing)
    {
        if ($listing->user_id != auth()->id()) {abort('403', 'Unauthorize Action'); }

        $data = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'logo' => 'image'
        ]);
        if ($request->hasFile('logo'))
        {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($data);
        return back()->with('message', 'Listing Updated Successfully!');
    }
    
    public function delete(Listings $listing)
    {
        if ($listing->user_id != auth()->id()) {abort('403', 'Unauthorize Action'); }
        $listing->delete();
        return redirect('/listings/manage')->with('message', 'Moved To Trash Successfully!');
    }
    public function manage()
    {
        return view('listings.manage',['listings' => auth()->user()->listings()->get()]);
    }
}