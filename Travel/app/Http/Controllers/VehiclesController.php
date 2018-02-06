<?php

namespace App\Http\Controllers;

use App\User;
use App\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicles::all();
        return view('vehicles.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required',
            'ticket_price' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        // process the login
        if ($validator->fails()) {
            return redirect('vehicles/create')
                ->withErrors($validator)
                ->withInput($request->all())->with('message', 'There is a problem ...');
        } else {
            $vehicle  = new Vehicles([
                'type' => $request->get('type'),
                'ticket_price' => $request->get('ticket_price')
            ]);
            $vehicle->save();
            return redirect('vehicles/create')->with('message', 'The vehicle was successfully created!');
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
        if(User::isAdmin()){
            $vehicle = Vehicles::find($id);
            return view('vehicles.edit', compact('vehicle', 'id'))->with('vehicle', $vehicle);
        }else{
            return redirect('vehicles')->with('message', 'You are not authorized to use this action');
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
            $vehicle = Vehicles::find($id);
            $vehicle->update($request->all());
            $vehicle->type = $request->get('type');
            $vehicle->ticket_price = $request->get('ticket_price');

            $vehicle->save();
            return redirect('vehicles')->with('message', 'Successfully updated!');
        }else{
            return redirect('vehicles')->with('message', 'You are not authorized to use this action');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicles::find($id);
        $vehicle->delete();
        return redirect('vehicles')->with('message', 'The vehicle was successfully deleted');
    }
}
