<?php

namespace App\Http\Controllers;


use App\Agents;
use App\Destinations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $destinations = Destinations::with('agents')->get();
        return view('Destinations.index') ->with('destinations', $destinations);

    }


    public function destinationAgent($id){
        $agents = Agents::all($id);
        return view('Destination.index')->with('agent',$agents);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Destinations.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:destinations|max:255',
            'country' => 'required|max:255',
            'duration' => 'required|max:255',
            'image' => 'required',
            'description' => 'required|max:255',

        ]);
        $destination = new Destinations([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'duration' => $request->get('duration'),
            'image' => $request->get('image'),
            'description' => $request->get('description'),
            'agent_id' => $request->get('agent_id')
        ]);

        $destination->save();
        return redirect('/destinations')->with('success', 'Added new destination!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destination = Destinations::find($id);
        $destination->delete();
        return redirect('/destinations')->with('success', 'Deleted!');
    }
}
