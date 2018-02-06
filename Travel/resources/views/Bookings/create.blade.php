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
                            <span>Booking for user: {{ Auth::user()->name }}</span>
                            @foreach($destination as $dest)
                                <span>Destination: {{$dest->name}}</span>
                                <span>Price: {{$dest->price}}</span>
                                <span>Agent:{{$dest->agents->first_name}} {{$dest->agents->last_name}} "{{$dest->agents->company}}"</span>
                                <span>Duration: {{$dest->duration}}</span>
                               <span>Vehicle:</span>
                            @endforeach
                            <input type="hidden" name="destination_id" value="{{$destination_id}}">
                            <div class="col-sm-12">
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