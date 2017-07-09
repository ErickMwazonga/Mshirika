@extends('layouts.app')

@section('content')

    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Create an Interaction</h5>
        <hr>

        {!! Form::open(['url' => '/interactions']) !!}
            @include('interactions._form', ['submitButtonText'=>'Submit'])
        {!! Form::close() !!}

    </div>

@stop