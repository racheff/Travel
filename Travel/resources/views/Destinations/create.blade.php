@include('layouts.header')
<section id="about">
    <div class="container">

        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Create a Destination</div></h2>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-info col-md-6">{{\Session::get('message') }}</div>
            @endif
            <div class="container col-md-6 edit_dest" id="portfolio">

                <div class="row">
                    <form method="post" action="{{url('destinations')}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="name">
                            </div>

                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="country">
                            </div>

                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Duration</label>
                            <div class="col-sm-10">

                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="duration">
                            </div>

                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Image(URL)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="image">
                            </div>

                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="description">
                            </div>

                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Agent</label>
                            <div class="col-sm-10">
                                <select name="agent_id" class="form-control form-control-lg select">
                                    <?php
                                       $agents = \App\Agents::all();
                                    ?>
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
</section>
@include('layouts.footer')