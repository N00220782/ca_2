<?php

namespace App\Http\Controllers\Admin;
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
            return to_route('user.shows.index');
        }
        $shows = Show::paginate(10);
        return view('admin.shows.index')->with('shows', $shows);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Auth::user()->authoriseRoles('admin');

        $venues = Venue::all();
        $artists = Artist::all();
        return view('admin.shows.create')->with('venues', $venues)
                                   ->with('artists', $artists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:shows,name|min:2|max:150',
                'date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'ticket_price' => 'required',
                'description' => 'required|string|min:5|max:1000',
                'venue_id' => 'required',
                'artists' =>['required' , 'exists:artists,id'],
                'show_image' => 'file|image'
            ]);

            $show_image = $request->file('show_image');
            $extension = $show_image->getClientOriginalExtension();
            $filename = date('Y-m-d-His') . '_' . $request->title . '.' . $extension;

            $show_image->storeAs('public/images', $filename);
    
            $show = Show::create([
                'name' => $request->name,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'ticket_price' => $request->ticket_price,
                'description' => $request->description,
                'venue_id' => $request->venue_id,
                'show_image' => $filename
            ]);

            $show->artists()->attach($request->artists);

    
            return to_route('admin.shows.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Show::findOrFail($id);

        return view('admin.shows.show', [
            'show' => $show 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venues = Venue::all();
        $artists = Artist::all();
        $show = Show::findOrFail($id);
        return view('admin.shows.edit')->with('venues', $venues)
                                   ->with('artists', $artists);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        {

            $request->validate([
                'name' => 'required|string|unique:shows,name|min:2|max:150',
                'date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'ticket_price' => 'required',
                'description' => 'required|string|min:5|max:1000',
                'venue_id' => 'required',
                'artists' =>['required' , 'exists:artists,id']
            ]);
    
            $show = Show::update([
                'name' => $request->name,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'ticket_price' => $request->ticket_price,
                'description' => $request->description,
                'venue_id' => $request->venue_id

            ]);

            $show->artists()->attach($request->artists);

    
            return to_route('admin.shows.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $show = Show::findOrFail($id);
        $show->delete();

        return redirect()->route('admin.shows.index')->with('status', 'Selected show deleted successfully :)');
    }
}