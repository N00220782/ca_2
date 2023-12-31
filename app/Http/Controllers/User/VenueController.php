<?php

namespace App\Http\Controllers\User;
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
        if(Auth::user()->hasRole('admin')){
            return to_route('admin.venues.index');
        }
        $venues = Venue::paginate(10);
        return view('user.venues.index')->with('venues', $venues);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::findOrFail($id);

        return view('user.venues.show', [
            'venue' => $venue 
        ]);
    }
}