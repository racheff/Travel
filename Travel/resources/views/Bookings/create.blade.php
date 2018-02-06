@include('layouts.header')
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Create a booking</div></h2>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif


            <div class="container col-md-6 edit_dest col-xs-10" id="portfolio">
                <div class="row">
                    <form method="post" action="{{url('bookings')}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <div class="booking_info">
                                <div>Booking for user: {{ Auth::user()->name }}</div>
                                @foreach($destination as $dest)
                                    <div>Destination: {{$dest->name}}</div>
                                    <div> Destination price: {{$dest->price}} USD</div>
                                    <div>Agent:{{$dest->agents->first_name}} {{$dest->agents->last_name}} "{{$dest->agents->company}}"</div>
                                    <div>Duration: {{$dest->duration}}</div>
                                    <div class="final_price"> Total Price: <span data-price="{{$dest->price}}" id="destination_price">{{$dest->price}}</span> USD</div>
                                @endforeach
                            </div>
                            <input type="hidden" name="destination_id" value="{{$destination_id}}">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Vehicle: </label>
                            <div class="col-sm-10">
                                <select name="vehicle_id" id="vehicles" onChange="finalPrice(this);">
                                    <option value="" disabled selected>Select your vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{$vehicle->id}}">{{$vehicle->type}} - {{$vehicle->ticket_price}} USD</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">From: </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-lg" id="lgFormGroupInput" name="date" required>
                            </div>

                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')