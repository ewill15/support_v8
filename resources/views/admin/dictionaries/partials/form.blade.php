<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('word') ? 'has-error' : ''}}">
                <label for="word" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.word')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('word', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('word', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('pronuntiation') ? 'has-error' : ''}}">
                <label for="pronuntiation" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.pronuntiation')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('pronuntiation', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('pronuntiation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('meaning') ? 'has-error' : ''}}">
                <label for="meaning" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.meaning')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('meaning', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('meaning', '<p class="help-block">:message</p>') !!}
                </div>
            </div>            
            <div class="form-group row {{ $errors->has('example') ? 'has-error' : ''}}">
                <label for="example" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.example')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::textarea('example', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('example', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>