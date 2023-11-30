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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::findOrFail($id);

        return view('admin.artists.show', [
            'artist' => $artist 
        ]);
    }

}