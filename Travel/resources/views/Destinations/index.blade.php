@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Destinations</div></h2>
            </div>

            <div class="container" id="portfolio">

                <div class="row">
                    <div class="col-md-6 text_below_h2">
                        <p> Destination prices are not visible now, because you need to book it and select a vehicle...Check destinations below and you'll see the "Book" button to proceed next step.</p>
                    </div>
                </div>
                @if (\Session::has('message'))
                    <div class="alert alert-info">{{\Session::get('message') }}</div>
                @endif
                <div class="row">
                    @foreach($destinations as $destination)

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn destination-box" data-wow-offset="50" data-wow-delay="0.6s">

                            <div class="portfolio-thumb">
                                <img src="{{$destination->image}}" class="img-responsive" alt="portfolio img 2">
                                <div class="portfolio-overlay">
                                    <h4>Name: {{$destination->name}}</h4>
                                    <p>Duration: {{$destination->duration}}</p>
                                    <p>Description: {{$destination->description}}</p>
                                    <p>Travel Agent: {{$destination->agents->company}}</p>

                                    <a href="{{action('DestinationsController@show', $destination->id )}}" class="btn btn-default">Details</a>
                                    @if (Route::has('login'))
                                        @if(auth()->user('admin') == true)
                                                <a href="{{ URL::to('bookings/create/' . $destination->id) }}" class="btn btn-default">Book it!</a>
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