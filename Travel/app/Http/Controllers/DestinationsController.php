<?php

namespace App\Http\Controllers;


use App\Agents;
use App\Destinations;
use App\Http\Requests\UpdateDestination;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        if(User::isAdmin()){
            $agents = Agents::all();
            return view('destinations.create')->with('agents', $agents);
        }else{
        return redirect('destinations')->with('message', 'You are not authorized to use this action');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'country'       => 'required',
            'duration'       => 'required',
            'image'       => 'required',
            'description'       => 'required',
            'agent_id'       => 'required',
            'price' => 'required'

        );
        $validator = Validator::make($request->all(), $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('destinations/create')
                ->withErrors($validator)
                ->withInput($request->all())->with('message', 'There is a problem ...');
        } else {
            $destinations = new Destinations([
                'name' => $request->get('name'),
                'country' => $request->get('country'),
                'duration' => $request->get('duration'),
                'image' => $request->get('image'),
                'description' => $request->get('description'),
                'agent_id' => $request->get('agent_id'),
                'price' => $request->get('price')
            ]);
            $destinations->save();
            return redirect('destinations/create')->with('message', 'The destination was successfully created!');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destinations = Destinations::with('agents')->find($id);
        return view('Destinations.details') ->with('destinations', $destinations);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::isAdmin()){
            $destinations = Destinations::find($id);
            return view('destinations.edit', compact('destination', 'id'))->with('destinations', $destinations);
        }else{
            return redirect('destinations')->with('message', 'You are not authorized to use this action');
        }

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
        if(User::isAdmin()){
            $destinations = Destinations::find($id);
            $destinations->update($request->all());
            $destinations->name = $request->get('name');
            $destinations->country = $request->get('country');
            $destinations->duration = $request->get('duration');
            $destinations->image = $request->get('image');
            $destinations->description = $request->get('description');
            $destinations->agent_id = $request->get('agent_id');
            $destinations->price = $request->get('price');
            $destinations->save();
            return redirect('destinations')->with('message', 'Successfully updated!');
        }else{
            return redirect('destinations')->with('message', 'You are not authorized to use this action');
        }



    }
    public function  book($id){
        echo $id;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::isAdmin()){
            $destination = Destinations::find($id);
            $destination->delete();
            return redirect('destinations')->with('message', 'Destination was deleted!');
        }else{
            return redirect('destinations')->with('message', 'You are not authorized to use this action');
        }

    }
}
