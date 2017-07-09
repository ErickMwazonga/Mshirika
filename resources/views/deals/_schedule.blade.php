<div class="form-group">
    <hr>
    <h5>Assign An Employee</h5>

    {!! Form::label('Assignee', 'Assignee:') !!}

    {!! Form::select('assignee', $users, null, ["required"=>"required"]) !!}
    @if ($errors->has('assignee'))
        <div id="help-err">
            <p><strong>{{ $errors->first('assignee') }}</strong></p>
        </div>
    @endif

    {{ Form::submit('Assign Employee', array('class' => 'button expanded')) }}
</div>
