@extends('layouts.app')

@section('content')
    <div class="form-blade large-10 large-offset-1 columns">

        @if (session('message1'))
            <div class="alert alert-success">
                {{ session('message1') }}
            </div>
        @endif

        <h5 class= "large-6 large-offset-4  columns">A List of Created Institutions</h5>

        <hr>

        @if ($institutions->isEmpty())
            <p>There are no institutions created</p>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Institution's Name</th>
                    <th>Status</th>
                    <th>Contact person's name</th>
                    <th>Phone number</th>
                    <th>Email address</th>
                    <th>Assignee</th>
                </tr>
                </thead>
                <tbody>
                @foreach($institutions as $institution)
                    <tr>
                        <td>{{ $institution->id }}</td>
                        <td>
                            <a href="{!! action('InstitutionsController@show', $institution->id) !!}">{{ $institution->name }}</a>
                        </td>
                        <td>{{ $institution->status }}</td>
    {{--                    <td>{{ $institution->contacted }}</td>--}}
                        <td>{{ $institution->cname }}</td>
                        <td>{{ $institution->phone }}</td>
                        <td>{{ $institution->email }}</td>
                        <td>
                            <a href="{!! action('UsersController@show', $institution->id) !!}">{{ $institution->assignee }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
            <br>
    </div>
@stop
