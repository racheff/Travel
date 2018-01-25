@include('layouts.header')
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Edit destination : {{$destinations->name}}</div></h2>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="container col-md-6 edit_dest" id="portfolio">
                <div class="row">
                    <div class="col-md-12">
                    <form method="post" action="{{action('DestinationsController@update', $id)}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Name" name="name">
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Country" name="country">
                            </div>

                            <div class="col-sm-12">

                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Duration" name="duration">
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Image(URL)" name="image">
                            </div>

                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Description" name="description">
                            </div>

                            <div class="col-sm-12">
                                <select name="agent_id" class="form-control form-control-lg select">
                                    <?php
                                    $agents = \App\Agents::all();
                                    ?>
                                    <option>Agent Company</option>
                                    @foreach($agents as $agent)
                                        <option value="{{$agent->id}}" class="selectors">{{$agent->company}}</option>
                                    @endforeach
                                </select>
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
    </div>
</section>
@include('layouts.footer')