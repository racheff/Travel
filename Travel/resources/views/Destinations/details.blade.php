@include('layouts.header')

<section id="about">
    <div class="container">

        <div class="row">
            <div class="col-md-6 heading">

                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div class="detailed"> <a href="{{URL::to('destinations')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>{{$destinations->name}}<span>{{$destinations->description}}</span></div></h2>
            </div>

            <div class="container" id="portfolio">
                <div class="row">
                    <div class="detailed_box col-md-5">
                    <img src="{{$destinations->image}}" class="img-responsive detailed_img" alt="portfolio img 2">
                   <div class="detailed_text_in_box">
                       <h1>{{$destinations->name}}</h1>
                        @if(!empty($destinations->country))
                           <p>This destination is located in {{$destinations->country}} </p>
                       @endif
                       @if(!empty($destinations->duration))
                           <p>Enjoy your {{$destinations->duration}} duration and see a lot of new things</p>
                       @endif
                       @if(!empty($destinations->agents))
                           <p>Agent company for this trip is "{{$destinations->agents->company}}" with owner {{$destinations->agents->first_name}} {{$destinations->agents->last_name}}</p>
                       @endif
                   </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')