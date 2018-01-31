@include('layouts.header')
<!-- start about me-->
<section id="about" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-md-6 heading">--}}
                {{--<h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Search a destination<span class="hot">new</span></div></h2>--}}
            {{--</div>--}}
            {{--<div class="container col-md-6 edit_dest" id="portfolio">--}}
                {{--<div class="row">--}}
                {{--<form method="" action="{{URL::to('search/')}}">--}}
                    {{--<div class="col-sm-12">--}}
                        {{--<input type="text" class="form-control form-control-lg" required id="searchfield" name="destination">--}}
                        {{--<button type="submit" id="search">--}}
                            {{--<i class="fa fa-search" aria-hidden="true"></i>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Best offers!<span class="hot">HOT</span><span>Grab your best offer for the best price.</span></div></h2>
            </div>
            <div class="container" id="portfolio">
        <div class="row">
            @foreach($destinations as $destination)
                @if($destination->price < 230)
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn destination-box" data-wow-offset="50" data-wow-delay="0.6s">

                    <div class="portfolio-thumb">
                        <img src="{{$destination->image}}" class="img-responsive" alt="portfolio img 2">

                            <span class="promo_label">Promotion</span>

                        <div class="portfolio-overlay">
                            <h4>Name: {{$destination->name}}</h4>
                            <p>Duration: {{$destination->duration}}</p>
                            <p>Price: {{$destination->price}}USD</p>
                            <p>Travel Agent: {{$destination->agents->company}}</p>

                            <a href="{{action('DestinationsController@show', $destination->id )}}" class="btn btn-default">Details</a>
                            @if (!\Illuminate\Support\Facades\Auth::guest())
                                <a href="{{ URL::to('bookings/create/' . $destination->id) }}" class="btn btn-default">Book it!</a>
                                @if(\App\User::isAdmin())
                                    <a href="{{ URL::to('destinations/' . $destination->id . '/edit') }}" class="btn btn-default">Edit</a>
                                    <form action="{{action('DestinationsController@destroy', $destination->id )}}" method="post" class="delete_form">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
        </div>

    </div>
</section>
<!-- end about me-->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>About us<span>What we are?</span></div></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text_under_heading">
                <p>This is a student project made by Kaloyan Krasimirov Rachev and it's not for a real purposes. Used information in this website will be real (for e.g. destinations, prices, travel agents) but only for non-commerce situations. Have fun !!!</p>
            </div>
        </div>
    </div>
</section>
<!-- end about me-->
@include('layouts.footer')