@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Editing Travel Agent -> {{$agent->company}}</div></h2>
            </div>
            <div class="container" id="portfolio">
                @if (\Session::has('message'))
                    <div class="alert alert-info">{{\Session::get('message') }}</div>
                @endif
                <div class="row">
                    <form method="post" class="col-md-6 edit_dest col-xs-10" action="{{action('AgentsController@update', $agent->id)}}">
                        <div class="form-group row">

                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="first_name" value="{{$agent->first_name}}">
                            </div>
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="last_name" value="{{$agent->last_name}}">
                            </div>
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Company</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="company" value="{{$agent->company}}">
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
</section>

@include('layouts.footer')