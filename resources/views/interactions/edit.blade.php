@extends('layouts.app')

@section('stylesheets')
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.css') }}"> --}}
  {!! Html::style('css/select2.css') !!}
@stop

@section('content')
    <div class="form-blade large-6 large-offset-3  columns">
        <h5>Edit an Interaction</h5>
        <hr>

        {!!  Form::model($interaction, ['method'=>'POST ','url' => "/interactions/$interaction->id/update"]) !!}

        @include('interactions._form', ['submitButtonText'=>'Edit'])

        {!! Form::close() !!}

    </div>
@stop

@section('scripts')
  {{-- <script src="{{ asset('js/parsley.min.js') }}"></script> --}}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $(".js-select2-multi").select2();
    $(".js-select2-multi").select2().val({!! json_encode($posts->tags()->getRelatedIds()) !!}).trigger("change");
  </script>
@stop
