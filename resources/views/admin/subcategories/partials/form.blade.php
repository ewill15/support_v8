<legend>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <fieldset>
                <div class="form-group row {{ $errors->has('name_subcategory') ? 'has-error' : ''}}">
                    {!! Form::label('name_subcategory', ucfirst(trans('common.name_subcategory')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name_subcategory', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('name_subcategory', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                    {!! Form::label('description', ucfirst(trans('common.description_subcategory')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                @if(isset($var_dr))
                    <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                        {!! Form::label('description', ucfirst(trans('common.state_subcategory')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                        <div class="input-group col-md-8">
                            {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' => 'required']) !!}
                            {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                        </div>
                    </div>
                @endif

            </fieldset>
        </div>
    </div>
</legend>