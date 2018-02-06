<?php

namespace App\Http\Controllers;
use App\Bookings;
use App\Http\Requests\CreditCardRequest;
use App\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use LVR\CreditCard\Cards\Card;
use LVR\CreditCard\Contracts\CreditCard;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::id();
        $payment = Payments::all()->where('user_id', $userid);
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
        $rules = array(
            'number' => 'required|min:19|max:19',
            'ccv' => 'required|min:3|max:3',
            'exp' => 'required|min:5|max:5'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('payments/create/'.$request->get('booking_id'))
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $id = Auth::id();
            $pay = new Payments([
                'booking_id' => $request->get('booking_id'),
                'user_id' => $id,
                'amount' => $request->get('amount'),
                'status' => 'Paid',
                'card' => $request->get('credit_card'),
                'number' => bcrypt($request->get('number')),
                'ccv' => bcrypt($request->get('ccv')),
                'exp' => $request->get('exp'),
                'name' => $request->get('name')
            ]);
            $pay->save();
            Bookings::updateStatus($request->get('booking_id'));
            return redirect('/payments')->with('message', 'Successfully paid !');
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
