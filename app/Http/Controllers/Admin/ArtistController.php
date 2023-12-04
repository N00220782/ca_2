<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Artist;
use Illuminate\Http\Request;
use Auth;

class ArtistController extends Controller
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
            return to_route('user.artists.index');
        }
        $artists = Artist::paginate(10);
        return view('admin.artists.index')->with('artists', $artists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Auth::user()->authoriseRoles('admin');

        $shows = Show::all();
        return view('admin.artists.create')->with('shows', $shows);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:artists,name|min:2|max:150',
                'genre' => 'required|in:Pop,Rock,Metal,Jazz,Hip Hop,Electronic'
            ]);
    
            $artist = Artist::create([
                'name' => $request->name,
                'genre' => $request->genre

            ]);
    
            return to_route('admin.artists.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::findOrFail($id);

        return view('admin.artists.show', [
            'artist' => $artist 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::findOrFail($id);
        $shows = Show::all();
        return view('admin.artists.edit')->with('shows', $shows);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:artists,name|min:2|max:150',
                'genre' => 'required|in:Pop,Rock,Metal,Jazz,Hip Hop,Electronic'
            ]);
    
            $artist = Artist::update([
                'name' => $request->name,
                'genre' => $request->genre

            ]);
    
            return to_route('admin.artists.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();

        return redirect()->route('admin.artists.index')->with('status', 'Selected artist deleted successfully :)');
    }
}