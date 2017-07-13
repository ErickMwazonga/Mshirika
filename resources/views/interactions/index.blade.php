@extends('layouts.app')

@section('content')
    <div class="form-blade large-10 large-offset-1 columns">
      <div class="row">
        <div class="large-9 columns top-list-create">
          <h5>A List of Created Interactions</h5>
        </div>
        <div class="large-3 columns">
          <a href="/interactions/create">
              <button class="button">Add Interaction</button>
          </a>
        </div>
      </div>
      <div class="row">
        <hr>

        @if ($interactions->isEmpty())
            <p>There are no Interactions created</p>
            <a href="/interactions/create">
                <button class="button">Add Interaction</button>
            </a>
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
    </div>
@stop
