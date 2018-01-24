@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Destinations<span class="hot">HOT</span><span>Grab your best offer for the best price.</span></div></h2>
            </div>
            <div class="container" id="portfolio">
                <div class="row">
                    @foreach($destinations as $destination)

                        <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn destination-box" data-wow-offset="50" data-wow-delay="0.6s">
                            <div class="portfolio-thumb">
                                <img src="{{$destination->image}}" class="img-responsive" alt="portfolio img 2">
                                <div class="portfolio-overlay">
                                    <h4>Name: {{$destination->name}}</h4>
                                    <p>Duration: {{$destination->duration}}</p>
                                    <p>Description: {{$destination->description}}</p>
                                    <p>Travel Agent: {{$destination->agent_id}}</p>

                                    <a href="{{ URL::to('bookings?destination_id=' . $destination->id) }}" class="btn btn-default">Book it!</a>
                                    <a href="{{ URL::to('destinations?id=' . $destination->id) }}" class="btn btn-default">Details</a>
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