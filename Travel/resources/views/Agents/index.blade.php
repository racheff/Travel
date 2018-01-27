@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Travel Agents</div></h2>
            </div>
            <div class="container" id="portfolio">
                <div class="row">
                    <table class="agents_table col-md-6">
                        <tr>
                            <th>№</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Company</th>
                        </tr>
                        @foreach($agents as $agent)
                            <tr>
                                <th>{{$agent->id}}</th>
                                <th>{{$agent->first_name}}</th>
                                <th>{{$agent->last_name}}</th>
                                <th>{{$agent->company}}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')