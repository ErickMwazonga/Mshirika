@extends('layouts.app')

@section('content')
  <div class="form-blade large-6 large-offset-3  columns">
      <h5>{!! $institution->name !!}'s institution</h5>
      <hr>

      <p>Status: {!! $institution->status !!}</p>
      <p>Contact Person: {!! $institution->cname !!}</p>
      <p>Phone number: {!! $institution->phone !!}</p>
      <p>Email address: {!! $institution->email !!}</p>
      <p>Employee Assignee: {!! $institution->assignee !!}</p>

      <div class="row">
          <div class="large-4 columns">
              <a class="button" href="{{ url("institutions/$institution->id/edit") }}">Edit Institution</a>
          </div>

          {{-- <div class="large-4 large-offset-1 columns">
              <form method="post" action="{!! action('InstitutionsController@destroy', $institution->id) !!}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <div class="form-group">
                      {!! Form::model($institution, ['method'=>'POST','url' => ' institution/{id?}/delete '.$institution->id]) !!}
                      {{ Form::submit('Delete Institution', array('class' => 'button alert')) }}
                  </div>
              </form>
          </div> --}}

          <div class="large-4 large-offset-1 columns">
            <a class="comfirm-delete button alert" href="{{ url("institution/$institution->id/comfirm-delete") }}">Delete Institution</a>
              {{-- <form method="post" action="{!! action('InstitutionsController@delete', $institution->id) !!}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                  <div class="form-group">
                      {!! Form::model($institution, ['method'=>'GET', 'url' => '/institution/{id?}/confirm-delete'.$institution->id]) !!}
                      {{ Form::submit('Delete Institution', array('class' => 'button alert')) }}
                  </div>
              </form> --}}
          </div>

          <br>

      </div>
      @if(Auth::user()->hasRole('manager'))
          <div class="">
              {!!  Form::model($institution, ['method'=>'POST ','url' => "/institutions/$institution->id/assign_update"]) !!}

              @include('institutions._assign_employee', ['submitButtonText'=>'Submit'])

              {!! Form::close() !!}

          </div>
      @endif
  </div>

@endsection


@section('scripts')
  <script>

    // $(document).on('click', '.comfirm-delete', function(e) {
    //     e.preventDefault();
    //     //sweet alert
    // });
</script>
@stop
