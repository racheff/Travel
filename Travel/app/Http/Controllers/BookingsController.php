<?php

namespace App\Http\Controllers;

use App\Destinations;
use App\User;
use App\Bookings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $bookings = Bookings::with('destinations')->get()->where('user_id', $id)->where('status', 'wait');

        return view('bookings.index')->with('bookings', $bookings);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $request = new Request();
        $req  =  $request->get('date');
        return view('bookings.create')->with('destination_id', $id);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $currentuserid = Auth::id();

        $booking = new Bookings([
            'user_id' => $currentuserid,
            'destination_id' => $request->get('destination_id'),
            'status' => 'wait',
            'from' => $request->get('date')
        ]);
        $booking->save();
        return redirect('/bookings')->with('message', 'Successfully booked ! Now you have to pay for it and check the requirements');

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
        $bookings = Bookings::find($id);
        $bookings->delete();
        return redirect('bookings')->with('success', 'Booking was deleted!');
    }
    public function bookDestination($id){

    }
}
