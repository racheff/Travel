@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Add a destination !
                        <a href="{{ URL::to('destinations') }}" class="pull-right">List all</a>
                    </div>

                    <div class="panel-body">
                        <!-- will be used to show any messages -->
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif



                        <form method="post" action="{{url('destinations')}}">
                            <div class="form-group row">
                                {{csrf_field()}}

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="name">
                                </div>

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Country</label>
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="country">
                                </div>

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Duration</label>
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="duration">
                                </div>

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Image(URL)</label>
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="image">
                                </div>

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                                    <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="description">
                                </div>

                                <div class="col-sm-12">
                                    <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Agent</label>
                                    <select name="agent_id" class="form-control form-control-lg">
                                        <?php
                                           $agents = \App\Agents::all();
                                        ?>
                                        @foreach($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->company}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection