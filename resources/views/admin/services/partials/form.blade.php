<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                <label for="name" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.service')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('name', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>