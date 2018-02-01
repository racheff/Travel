@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Bookings</div></h2>
            </div>

            <div class="container" id="portfolio">
                @if (\Session::has('success'))
                    <div class="alert alert-info">{{\Session::get('success') }}</div>
                @endif
                <div class="row">
                    <div class="col-md-6 text_below_h2">
                        <p>Once you've book a destination, you have to pay for it. Payments are depending on destinations(duration and location) and vehicles.Prices are different for every destination. When you creating a booking you must set a date.Date From and Date to. If destination have duration(for e.g. 6 days) you can't exceed it and you need to chooce only date From.You can delete the book before pay for it.</p>
                    </div>
                </div>
                <div class="row">
                    @if($bookings->isNotEmpty())
                        <table class="agents_table col-md-6">
                            <tr>
                                <th>Destination</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>From</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                            @foreach($bookings as $booking)
                                <tr>
                                    <th>{{$booking->destinations->name}}({{$booking->destinations->country}})</th>
                                    <th>{{$booking->destinations->price}} USD</th>
                                    <th>{{$booking->status}}</th>
                                    <th>{{$booking->from}}</th>
                                    <th>{{$booking->destinations->duration}}</th>
                                    <th>
                                        <a href="{{ URL::to('payments/create/' . $booking->id) }}" class="btn btn-success">Pay</a>
                                        <form action="{{action('BookingsController@destroy', $booking->id )}}" method="post" class="delete_form">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <div class="not_available">Not available bookings</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')