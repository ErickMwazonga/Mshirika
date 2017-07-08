@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-blade large-6 large-offset-3  columns">
            <h5>{!! $user->name !!}</h5>
            <hr>

            <p>Email: {!! $user->email !!}</p>

            <br>

        </div>
    </div>

@endsection