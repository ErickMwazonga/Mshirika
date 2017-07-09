@extends('layouts.app')

@section('content')

    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Create a Deal</h5>
        <hr>

        {!! Form::open(['url' => '/deals']) !!}
            @include('deals._form', ['submitButtonText'=>'Submit'])
        {!! Form::close() !!}

    </div>

@stop