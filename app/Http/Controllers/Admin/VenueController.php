<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Auth;

class VenueController extends Controller
{
    public function __construct(){
        //Auth::user()->authoriseRoles('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Auth::user()->authoriseRoles('admin');
        if(!Auth::user()->hasRole('admin')){
            return to_route('user.venues.index');
        }
        $venues = Venue::paginate(10);
        return view('admin.venues.index')->with('venues', $venues);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Auth::user()->authoriseRoles('admin');

        return view('admin.venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:shows,name|min:2|max:150',
                'address' => 'required',
                'capacity' => 'required',
                'phone' => 'required',
                'email' => 'required'
            ]);
    
            $venue = Venue::create([
                'name' => $request->name,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'phone' => $request->phone,
                'email' => $request->email

            ]);
    
            return to_route('admin.venues.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::findOrFail($id);

        return view('admin.venues.show', [
            'venue' => $venue 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venue = Venue::findOrFail($id);
        return view('admin.venues.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:shows,name|min:2|max:150',
                'address' => 'required',
                'capacity' => 'required',
                'phone' => 'required',
                'email' => 'required'
            ]);
    
            $venue = Venue::update([
                'name' => $request->name,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'phone' => $request->phone,
                'email' => $request->email

            ]);
    
            return to_route('admin.venues.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();

        return redirect()->route('admin.venues.index')->with('status', 'Selected venue deleted successfully :)');
    }
}