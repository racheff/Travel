@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Destinations<span class="hot">HOT</span><span>Grab your best offer for the best price.</span></div></h2>
            </div>
            <div class="container" id="portfolio">
                <div class="row">
                    @foreach($agents as $agent)
                       {{$agent->first_name}}
                        {{$agent->last_name}}
                        {{$agent->company}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')