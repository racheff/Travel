@include('layouts.header')

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 heading">
                <h2 class="wow bounceIn" data-wow-offset="50" data-wow-delay="0.3s"><div>Payments</div></h2>
            </div>

            <div class="container" id="portfolio">
                @if (\Session::has('message'))
                    <div class="alert alert-info">{{\Session::get('message') }}</div>
                @endif
                <div class="row">
                    @if($payment->isNotEmpty())
                    <table class="agents_table col-md-6 col-xs-10">
                        <tr>
                            <th>Owner</th>
                            <th>Status</th>
                            <th>Card</th>
                            <th>Amount</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @foreach($payment as $pay)
                            <tr>
                                <th>{{$pay->name}}</th>
                                <th>{{$pay->status}}</th>
                                <th>{{$pay->card}}</th>
                                <th>{{$pay->amount}} USD</th>
                                <th>{{$pay->created_at}}</th>
                                <th>
                                    <form action="{{action('PaymentsController@destroy', $pay->id )}}" method="post" class="delete_form">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Refund</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="not_available">Not available payments</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')