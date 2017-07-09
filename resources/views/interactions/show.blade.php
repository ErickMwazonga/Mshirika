@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-blade large-6 large-offset-3  columns">
            <h5>Interaction {!! $interaction->id !!}</h5>
            <hr>
            
            <p>User: {!! $interaction->owner->name !!}</p>
            <p>interaction: {!! $interaction->institution->name !!}</p>
            <p>Type: {!! $interaction->type !!}</p>
            <p>Follow up Items: {!! $interaction->follow_up_items !!}</p>
            <p>Created At: {!! $interaction->created_at !!}</p>

            <div class="row">
                <div class="large-4 columns">
                    <a class="button" href="{{ url("interactions/$interaction->id/edit") }}">Edit interaction</a>
                </div>

                <div class="large-4 large-offset-1 columns">
                    <form method="post" action="{!! action('InteractionsController@destroy', $interaction->id) !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            {!! Form::model($interaction, ['method'=>'POST', 'id' => 'confirm_delete', 'url' => ' interaction/{id?}/delete '.$interaction->id]) !!}
                            {{ Form::submit('Delete interaction', array('class' => 'button alert')) }}
                        </div>
                    </form>
                </div>

                <br>
            </div>

            {{--<div>--}}
                {{--{!!  Form::model($interaction, ['method'=>'POST ','url' => "/interaction/$interaction->id/schedule"]) !!}--}}

                    {{--@include('interactions._schedule', ['submitButtonText'=>'Submit'])--}}

                {{--{!! Form::close() !!}--}}

            {{--</div>--}}
        </div>
    </div>

@endsection
