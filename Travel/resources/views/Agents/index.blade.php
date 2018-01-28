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
                            @if(\App\User::isAdmin())
                            <th>Action</th>
                            @endif
                        </tr>
                        @foreach($agents as $agent)
                            <tr>
                                <th>{{$agent->id}}</th>
                                <th>{{$agent->first_name}}</th>
                                <th>{{$agent->last_name}}</th>
                                <th>{{$agent->company}}</th>
                                @if(\App\User::isAdmin())
                                <th>
                                    <a href="{{ URL::to('agents/' . $agent->id . '/edit') }}" class="btn btn-success">Edit</a>
                                    <form action="{{action('AgentsController@destroy', $agent->id )}}" method="post" class="delete_form">
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