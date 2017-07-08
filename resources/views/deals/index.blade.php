@extends('layouts.app')

@section('content')
    <div class="form-blade large-10 large-offset-1 columns">

        <h5 class= "large-6 large-offset-4  columns">A List of Created Deals</h5>

        <hr>

        @if ($deals->isEmpty())
            <p>There are no deals created</p>
        @else
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>Interaction's Id</th>
                    <th>Company Ratio</th>
                    <th>Institution Ratio</th>
                    <th>Agreement</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deals as $deal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $deal->interaction_id }}
                            {{--<a href="{!! action('DealsController@show', $institution->id) !!}">{{ $deal->name }}</a>--}}
                        </td>
                        <td>{{ $deal->company_ratio }}</td>
                        <td>{{ $deal->institution_ratio }}</td>
                        <td>{{ $deal->agreement }}</td>
                        <td>{{ $deal->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
        <br>
    </div>
@stop
