<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('start') ? 'has-error' : ''}}">
                <label for="start" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.date_start')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('start', null, ['class' => 'form-control date', "required", "readonly"]) !!}
                    {!! $errors->first('start', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('end') ? 'has-error' : ''}}">
                <label for="end" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.date_end')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('end', null, ['class' => 'form-control date', "required", "readonly"]) !!}
                    {!! $errors->first('end', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder'=>"Nombre de usuario", "required"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('company') ? 'has-error' : ''}}">
                <label for="company" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.company')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('company', null, ['class' => 'form-control','required', 'placeholder'=>"","required"]) !!}
                    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('resume') ? 'has-error' : ''}}">
                <label for="resume" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.resume')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('resume_id', @$resumes,null, ['class' => 'form-control','required', 'placeholder'=>"","required"]) !!}
                    {!! $errors->first('resume_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>