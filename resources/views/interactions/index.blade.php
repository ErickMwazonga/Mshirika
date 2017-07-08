@extends('layouts.app')

@section('content')
    <div class="form-blade large-10 large-offset-1 columns">

        <h5 class= "large-6 large-offset-4  columns">A List of Created Interactions</h5>

        <hr>

        @if ($interactions->isEmpty())
            <p>There are no Interactions created</p>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>User</th>
                    <th>Institution</th>
                    <th>Type</th>
                    <th>Follow Up Items</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($interactions as $interaction)
                    <tr>
                        <td>
                            <a href="{!! action('InteractionsController@show', $interaction->id) !!}">{{ $loop->iteration  }}</a>
                        </td>
                        <td>
                            {{ $interaction->owner->name }}
                            {{--<a href="{!! action('interactionsController@show', $interaction->id) !!}">{{ $interaction->user_id }}</a>--}}
                        </td>
                        <td>{{ $interaction->institution->name }}</td>
                        <td>{{ $interaction->type }}</td>
                        <td>{{ $interaction->follow_up_items }}</td>
                        <td>{{ $interaction->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
        <br>
    </div>
@stop
