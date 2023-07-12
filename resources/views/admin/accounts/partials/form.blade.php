<div class="row">
    <div class="col-lg-12 mb-20">
        <p>Campos con  (
            <span class="text-danger">*</span>
            ) son obligatorios
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.name')) }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('name', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : ''}}">
                <label for="last_name" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.last_name')) }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('mobile') ? 'has-error' : ''}}">
                <label for="mobile" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.mobile')) }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('number') ? 'has-error' : ''}}">
                <label for="number" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.number_account')) }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('bank_id') ? 'has-error' : ''}}">
                <label for="bank_id" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.bank')) }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('bank_id', @$banks, null, ['class' => 'form-control']) !!}
                    {!! $errors->first('bank_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>