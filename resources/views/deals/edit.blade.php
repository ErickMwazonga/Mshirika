@extends('layouts.app')

@section('content')
    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Edit a Deal</h5>
        <hr>

        {!!  Form::model($deal, ['method'=>'PUT','url' => "/deals/$deal->id/update"]) !!}

          @include('deals._form', ['submitButtonText'=>'Edit'])

        {!! Form::close() !!}

    </div>
@stop
