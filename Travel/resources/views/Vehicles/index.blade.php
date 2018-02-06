@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Vehicles</div></h2>
            </div>
            <div class="container" id="portfolio">
                <div class="row">
                    <table class="agents_table col-md-6 col-xs-10">
                        <tr>
                            <th>№</th>
                            <th>Type</th>
                            <th>Ticket price</th>
                            @if(\App\User::isAdmin())
                                <th>Action</th>
                            @endif
                        </tr>
                        @foreach($vehicles as $vehicle)
                            <tr>
                                <th>{{$vehicle->id}}</th>
                                <th>{{$vehicle->type}}</th>
                                <th>{{$vehicle->ticket_price}} USD</th>
                                @if(\App\User::isAdmin())
                                    <th>
                                        <a href="{{ URL::to('vehicles/' . $vehicle->id . '/edit') }}" class="btn btn-success">Edit</a>
                                        <form action="{{action('VehiclesController@destroy', $vehicle->id )}}" method="post" class="delete_form">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </th>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')