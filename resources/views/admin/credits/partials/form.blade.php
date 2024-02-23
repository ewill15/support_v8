<div class="row">
    <div class="col-lg-12 mb-20">
        <p>Campos con  (
            <span class="text-danger">*</span>
            ) son obligatorios
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('reason') ? 'has-error' : ''}}">
                <label for="reason" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.reason')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('reason', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('reason', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('total') ? 'has-error' : ''}}">
                <label for="total" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.total')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('total', null, ['class' => 'form-control','step'=>0.1]) !!}
                    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('init') ? 'has-error' : ''}}">
                <label for="init" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.init')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('init', null, ['class' => 'form-control','step'=>0.1,'min'=>1]) !!}
                    {!! $errors->first('init', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('monthly_fee') ? 'has-error' : ''}}">
                <label for="monthly_fee" class="col-md-4 form-control-label text-right">
                    {{ ucfirst(trans('validation.attributes.monthly_fee')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('monthly_fee', null, ['class' => 'form-control','step'=>1,'min'=>1]) !!}
                    {!! $errors->first('monthly_fee', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('months_to_pay') ? 'has-error' : ''}}">
                <label for="months_to_pay" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.months_to_pay')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('months_to_pay', null, ['class' => 'form-control','step'=>1 ,'min'=>1]) !!}
                    {!! $errors->first('months_to_pay', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>