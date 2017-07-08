@extends('layouts.app')

@section('content')
    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Edit an Interaction</h5>
        <hr>

        {!!  Form::model($interaction, ['method'=>'POST ','url' => "/interactions/$interaction->id/update"]) !!}

        @include('interactions._form', ['submitButtonText'=>'Edit'])

        {!! Form::close() !!}

    </div>
@stop
