@extends('layouts.app')

@section('content')
    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Edit an Institution</h5>
        <hr>

        {!!  Form::model($institution, ['method'=>'PATCH ','url' => "/institutions/$institution->id/update"]) !!}

          @include('institutions._form', ['submitButtonText'=>'Edit'])

        {!! Form::close() !!}

    </div>
@stop
