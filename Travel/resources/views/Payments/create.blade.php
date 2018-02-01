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


            <div class="container col-md-6 edit_dest" id="portfolio">
                <div class="row">
                    <form method="post" action="{{url('payments')}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <span>Pay for user: {{ Auth::user()->name }}</span>
                            {{--hiddens--}}
                            @foreach($payment as $pay)
                                <span>Booking ID: {{$pay->id}}</span>
                                <span>Destination: {{$pay->destinations->name}}</span>
                                <span>Price: {{$pay->destinations->price}} USD</span>
                                <span>Date: {{$pay->from = date('d.m.Y')}}</span>
                                <input type="hidden" name="booking_id" value="{{$booking_id}}">
                                <input type="hidden" name="amount" value="{{$pay->destinations->price}}">
                            @endforeach
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Card №</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control form-control-lg" id="lgFormGroupInput" name="credit_card" required>
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