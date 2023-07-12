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
                    {{ ucfirst(trans('validation.attributes.service')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::select('name', $list_services,null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('month') ? 'has-error' : ''}}">
                <label for="month" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.month')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('month', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('amount') ? 'has-error' : ''}}">
                <label for="amount" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.amount')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('amount', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group row {{ $errors->has('year') ? 'has-error' : ''}}">
                <label for="year" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.year')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::numeric('year', date('Y'), ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

        </fieldset>
    </div>
</div>