<div class="form-group">
    <hr>
    <h5>Schedule Interaction {!! $interaction->id !!}</h5>

    <div class="form-group">
        {!! Form::label('meeting_time', 'Meeting Time:') !!}
        {!! Form::input('datetime-local', 'meeting_time', date('Y-m-d H:m:s'), ['class'=>'form-control', "required"=>"required"]) !!}
        @if ($errors->has('meeting_time'))
            <div id="help-err">
                <p><strong>{{ $errors->first('meeting_time') }}</strong></p>
            </div>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('reminder_time', 'Reminder Time:') !!}
        {!! Form::select('reminder_time', [
           1 => '1 Hour Before',
           2 => '2 Hour Before',
           5 => '5 Hour Before',
           6 => '6 Hour Before',
           12 => '12 Hour Before',
           24 => '24 Hour Before'],null,['class' => 'form-control', "required"=>"required"]) !!}
        @if ($errors->has('reminder_time'))
            <div id="help-err">
                <p><strong>{{ $errors->first('reminder_time') }}</strong></p>
            </div>
        @endif
    </div>

    {{ Form::submit('Schedule an Interaction', array('class' => 'button expanded')) }}
</div>
