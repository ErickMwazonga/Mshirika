@extends('layouts.app')

@section('stylesheets')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.foundation.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
@stop

@section('content')
    <div class="form-blade large-10 large-offset-1 small-12 columns">
      <div class="row">
        <div class="large-9 columns top-list-create">
          <h5>A List of Created Institutions</h5>
        </div>

        {{-- <div class="large-3 columns">
          <form action="{{ url('/institutions') }}" method="get">
            {{ csrf_field() }}
            <div class="input-group">
              <div class="input-group-field">
                <input type="text" name="q"
                  value="{{ isset($query) ? $query : '' }}"
                  placeholder="Search">
              </div>
              <div class="input-group-button">
                <input type="submit" class="button round" value="Go">
              </div>
            </div>
          </form>
        </div> --}}

        <div class="large-3 columns">
          <a href="/institutions/create">
              <button style="width:100%;" class="button">Add Institution</button>
          </a>
        </div>
      </div>

      <div class="row">
        @if ($institutions->isEmpty())
          <div class="large-12 small-12 columnsr">
            <p>There are no Institutions!</p>
          </div>
            {{-- <a href="/institutions/create">
                <button class="button">Add Institution</button>
            </a> --}}
        @else
            <table class="table table-striped table-bordered table-scroll display" id="table">
                <thead>
                  <tr>
                      <th></th>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{!! action('InstitutionsController@show', $institution->id) !!}">{{ $institution->name }}</a>
                        </td>
                        <td>{{ $institution->status }}</td>
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
      </div>
        {{-- <div class="text-center">
          {{-- {!! $institutions->appends(['q' => $query])->links(); !!} --}}
          {{-- {!! $institutions->links(); !!} --}}
        {{-- </div> --}}
    </div>
@stop

@section('scripts')
  {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.foundation.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#table').DataTable();
    } );
 </script>

@endsection
