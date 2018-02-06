@include('layouts.header')
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Create a payment</div></h2>
            </div>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif


            <div class="container col-md-6 edit_dest col-xs-10" id="portfolio">
                <div class="row">
                    <form method="post" action="{{url('payments')}}" id="payment_form">
                        <div class="form-group row">
                            {{csrf_field()}}
                            <img src="{{asset('images/Visa.png')}}" class="visa_master_card" alt="payments">
                            <div class="card_details col-md-8">
                            {{--hiddens--}}
                            @foreach($payment as $pay)
                                <input type="hidden" name="booking_id" value="{{$booking_id}}">
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Price: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="amount" value="{{$pay->destinations->price}}" readonly="">
                                </div>
                            @endforeach

                                @if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('ccv'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('ccv') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('exp'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('exp') }}</strong>
                                </span>
                                @endif
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Type: </label>
                                <div class="col-md-6">
                                    <select name="credit_card">
                                        <option value="visa">Visa</option>
                                        <option value="master">Master Card</option>
                                    </select>
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Number: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="XXXX-XXXX-XXXX-XXXX" name="number" required="">
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CVV: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="XXX" name="ccv" required="">
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">EXP: </label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="XX/XX" name="exp" required="">
                                </div>
                                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name: </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="name" required="">
                                </div>
                            </div>
                            <div class="col-sm-8 payment_submit">
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