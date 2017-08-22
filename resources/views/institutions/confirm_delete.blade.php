@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-blade large-6 large-offset-3  columns">
            <p>Kindly comfirm deletion of <strong>{{ $institution->name }}'s</strong> institution</p>

            {{ Form::open(['url' => "/institution/$institution->id/delete", "method" => "POST"]) }}
              <a class="button alert" href="{{ url("institutions") }}">Cancel</a>
              {{ Form::submit('Comfirm Delete', ['class' => 'button danger']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
