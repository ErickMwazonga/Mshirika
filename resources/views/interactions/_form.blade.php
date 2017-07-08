<div class="form-group">
    {!! Form::label('institution_id', 'Institution:') !!}
    {!! Form::select('institution_id', $institutions, null, ["required"=>"required"]) !!}
    @if ($errors->has('institution_id'))
        <div id="help-err">
            <p><strong>{{ $errors->first('institution_id') }}</strong></p>
        </div>
    @endif
</div>


<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', [
       'calls' => 'Calls',
       'emails' => 'Emails',
       'meetings' => 'Meetings'], null, ['class' => 'form-control', "required"=>"required"]) !!}
    @if ($errors->has('type'))
        <div id="help-err">
            <p><strong>{{ $errors->first('type') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('follow_up_items', "Follow up Items:") !!}
    {!! Form::text('follow_up_items', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('follow_up_items'))
        <div id="help-err">
            <p><strong>{{ $errors->first('follow_up_items') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Created On:') !!}
    {!! Form::input('date', 'created_at', date('Y-m-d'), ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('created_at'))
        <div id="help-err">
            <p><strong>{{ $errors->first('created_at') }}</strong></p>
        </div>
    @endif
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'button']) !!}
</div>
