<?php

namespace App\Http\Controllers;
use App\Bookings;
use App\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payments::all();
        return view('payments.index')->with('payment', $payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $guest = Auth::guest();
        if(!$guest){
            $request = new Request();
            $payments = Bookings::with('destinations')->where('id', $id)->get();
            return view('payments.create')->with('booking_id', $id)->with('payment',$payments);
        }else{
            return view('payments.index')->with('message', 'You have to log in first');

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
        $id = Auth::id();
        $pay = new Payments([
            'booking_id' => $request->get('booking_id'),
            'user_id' => $id,
            'amount' => $request->get('amount'),
            'status' => 'Paid',
            'card' => $request->get('credit_card')
        ]);
        $pay->save();
        Bookings::updateStatus($request->get('booking_id'));
        return redirect('/payments')->with('message', 'Successfully paid !');
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
        $currentBooking = Payments::find($id)->toArray();
        Bookings::refund($currentBooking['booking_id']) ;
        $payment = Payments::find($id);
        $payment->delete();

        return redirect('payments')->with('message', 'Payment refunded !');
    }
}
