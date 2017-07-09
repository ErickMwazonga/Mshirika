@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-blade large-6 large-offset-3  columns">
            <h5>{!! $deal->name !!}'s Name</h5>
            <hr>

            <p>Description: {!! $deal->description!!}</p>
            <p>Interaction ID: {!! $deal->interaction_id !!}</p>
            <p>Company's Ratio: {!! $deal->company_ratio !!}</p>
            <p>Institution's Ratio: {!! $deal->institution_ratio !!}</p>
            <p>Created At: {!! $deal->created_at !!}</p>

            <div class="row">
                <div class="large-4 columns">
                    <a class="button" href="{{ url("deals/$deal->id/edit") }}">Edit Deal</a>
                </div>

                <div class="large-4 large-offset-1 columns">
                    <form method="post" action="{!! action('DealsController@destroy', $deal->id) !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            {!!  Form::model($deal, ['method'=>'POST', 'url' => ' deal/{id?}/delete '.$deal->id]) !!}
                            {{ Form::submit('Delete deal', array('class' => 'button alert')) }}
                        </div>
                    </form>
                </div>

                <br>

            </div>


        </div>
    </div>

@endsection

