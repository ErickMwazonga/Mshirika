<div class="form-group">
    {!! Form::label('interaction_id', 'Interaction ID:') !!}
    {!! Form::select('interaction_id', $interactions, null, ["required"=>"required"]) !!}
    @if ($errors->has('interaction_id'))
        <div id="help-err">
            <p><strong>{{ $errors->first('interaction_id') }}</strong></p>
        </div>
    @endif
</div>


<div class="form-group">
    {!! Form::label('name', "Deal's Name:") !!}
    {!! Form::text('name', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('name'))
        <div id="help-err">
            <p><strong>{{ $errors->first('name') }}</strong></p>
        </div>
    @endif
</div>


<div class="form-group">
    {!! Form::label('description', "Description:") !!}
    {!! Form::text('description', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('description'))
        <div id="help-err">
            <p><strong>{{ $errors->first('description') }}</strong></p>
        </div>
    @endif
</div>



<div class="form-group">
    {!! Form::label('company_ratio', "Company's Ratio:") !!}
    {!! Form::text('company_ratio', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('company_ratio'))
        <div id="help-err">
            <p><strong>{{ $errors->first('company_ratio') }}</strong></p>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('institution_ratio', "Institution's Ratio:") !!}
    {!! Form::text('institution_ratio', null, ['class'=>'form-control', "required"=>"required"]) !!}
    @if ($errors->has('institution_ratio'))
        <div id="help-err">
            <p><strong>{{ $errors->first('institution_ratio') }}</strong></p>
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
