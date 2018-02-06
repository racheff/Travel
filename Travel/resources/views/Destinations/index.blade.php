@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-6 heading">
                    <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Search a destination<span class="hot">new</span></div></h2>
                </div>
                <div class="container col-md-6 edit_dest col-xs-10">
                    <div class="row">
                        <form method="" action="{{URL::to('search/')}}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-lg" required="" id="searchfield" name="destination">
                                <button type="submit" id="search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container" id="portfolio">

                @if (\Session::has('message'))
                    <div class="alert alert-info">{{\Session::get('message') }}</div>
                @endif
                <div class="row">
                    @foreach($destinations as $destination)

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn destination-box" data-wow-offset="50" data-wow-delay="0.6s">

                            <div class="portfolio-thumb">
                                <img src="{{asset('images/destinations')}}/{{$destination->image}}" class="img-responsive" alt="destination picture">
                                @if($destination->price < 230)
                                    <span class="promo_label">Promotion</span>
                                @endif
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')