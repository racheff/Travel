@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Vehicles</div></h2>
            </div>
            <div class="container" id="portfolio">
                <div class="row">
                    <div class="col-md-6 text_below_h2">
                        <p>Create a Vehicle</p>
                    </div>
                </div>
                @if (\Session::has('message'))
                    <div class="alert alert-info">{{\Session::get('message') }}</div>
                @endif
                <div class="row">
                    <form method="post" class="col-md-6 edit_dest col-xs-10" action="{{url('vehicles')}}">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Type</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="type">
                            </div>
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Ticket price(USD)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="ticket_price">
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