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
                    <table class="agents_table col-md-6">
                        <tr>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>From</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                        @foreach($bookings as $booking)
                            <tr>
                                <th>{{$booking->destinations->name}}({{$booking->destinations->country}})</th>
                                <th>{{$booking->status}}</th>
                                <th>{{$booking->from}}</th>
                                <th>{{$booking->destinations->duration}}</th>
                                <th>
                                    <a href="#" class="btn btn-success">Pay</a>
                                    <form action="{{action('BookingsController@destroy', $booking->id )}}" method="post" class="delete_form">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')