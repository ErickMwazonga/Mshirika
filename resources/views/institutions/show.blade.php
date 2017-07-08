@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-blade large-6 large-offset-3  columns">
            <h5>{!! $institution->name !!}'s institution</h5>
            <hr>

            <p>Status: {!! $institution->status !!}</p>
            <p>Contact Person: {!! $institution->cname !!}</p>
            <p>Phone number: {!! $institution->phone !!}</p>
            <p>Email address: {!! $institution->email !!}</p>

            <div class="row">
                <div class="large-4 columns">
                    <a class="button" href="{{ url("institutions/$institution->id/edit") }}">Edit Institution</a>
                </div>
                <div class="large-4 columns">
                    <a class="button success" href="#">Assign Employee</a>
                </div>
                <div class="large-4 columns">
                    <form method="post" action="{!! action('InstitutionsController@destroy', $institution->id) !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            {!!  Form::model($institution, ['method'=>'POST','url' => ' institution/{id?}/delete '.$institution->id]) !!}
                            {{ Form::submit('Delete Institution', array('class' => 'button alert')) }}
                        </div>
                    </form>
                </div>


                <br>

                <div class="clearfix"></div>

            </div>
            @if(Auth::user()->hasRole('manager'))
                <div class="">
                    {!! Form::open(['url' => '/institutions']) !!}
                    @include('institutions._form', ['submitButtonText'=>'Submit'])
                    {!! Form::close() !!}
                </div>
            @endif


        </div>
    </div>

@endsection

