<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('responsable') ? 'has-error' : ''}}">
                <label for="responsable" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.responsable')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('responsable', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('responsable', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('motherboard') ? 'has-error' : ''}}">
                <label for="motherboard" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.motherboard')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('motherboard', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('motherboard', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('processor') ? 'has-error' : ''}}">
                <label for="processor" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.processor')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('processor', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('processor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('IP') ? 'has-error' : ''}}">
                <label for="IP" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.ip')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('IP', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('IP', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('operative_system') ? 'has-error' : ''}}">
                <label for="operative_system" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.operative_system')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::select('operative_system', ["windows"=>"Windows","linux"=>"Linux","mac"=>"Mac"],null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('operative_system', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('mail_address') ? 'has-error' : ''}}">
                <label for="mail_address" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.mail_address')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('mail_address', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('mail_address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('office_package') ? 'has-error' : ''}}">
                <label for="office_package" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.office_package')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('office_package', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('office_package', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('other') ? 'has-error' : ''}}">
                <label for="other" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.other')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::textarea('other', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>