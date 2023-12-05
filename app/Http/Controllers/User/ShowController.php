<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Venue;
use App\Models\Artist;
use Illuminate\Http\Request;
use Auth;

class ShowController extends Controller
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
            return to_route('shows.index');
        }
        $shows = Show::paginate(10);
        return view('user.shows.index')->with('shows', $shows);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Show::findOrFail($id);

        return view('user.shows.show', [
            'show' => $show 
        ]);
    }
}