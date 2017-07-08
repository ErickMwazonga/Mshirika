<div class="form-group">
        {!! Form::label('name', 'Institution Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', "required"=>"required"]) !!}
        @if ($errors->has('name'))
            <div id="help-err">
                <p><strong>{{ $errors->first('name') }}</strong></p>
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
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', [
           'interested' => 'Interested',
           'not_interested' => 'Not Interested',
           'in_talks' => 'In-Talks'], null, ['class' => 'form-control', "required"=>"required"]) !!}
        @if ($errors->has('status'))
            <div id="help-err">
                <p><strong>{{ $errors->first('status') }}</strong></p>
            </div>
        @endif
</div>

<div class="form-group">
    <h5>Contact person details</h5>
    <hr>
    {!! Form::label('cname', "Full Name:") !!}
    {!! Form::text('cname', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('cname'))
        <div id="help-err">
            <p><strong>{{ $errors->first('cname') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone number:') !!}
    {!! Form::text('phone', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('phone'))
        <div id="help-err">
            <p><strong>{{ $errors->first('phone') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('email', 'Email address:') !!}
    {!! Form::text('email', null, ["type"=>"email", 'class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('email'))
        <div id="help-err">
            <p><strong>{{ $errors->first('email') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>
