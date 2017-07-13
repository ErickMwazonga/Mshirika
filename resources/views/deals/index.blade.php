@extends('layouts.app')

@section('content')
    <div class="form-blade large-10 large-offset-1 columns">
      <div class="row">
        <div class="large-9 columns top-list-create">
          <h5>A List of Created Deals</h5>
        </div>
        <div class="large-3 columns">
          <a href="/deals/create">
              <button class="button">Add Deal</button>
          </a>
        </div>
      </div>
      <div class="row">
        <hr>

        @if ($deals->isEmpty())
            <p>There are no deals created</p>
            <a href="/deals/create">
                <button class="button">Add Deal</button>
            </a>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>Deal's Name</th>
                    <th>Company Ratio</th>
                    <th>Institution Ratio</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deals as $deal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{!! action('DealsController@show', $deal->id) !!}">{{ $deal->name }}</a>
                        </td>
                        <td>{{ $deal->company_ratio }}</td>
                        <td>{{ $deal->institution_ratio }}</td>
                        <td>{{ $deal->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <br>
      </div>
    </div>
@stop
