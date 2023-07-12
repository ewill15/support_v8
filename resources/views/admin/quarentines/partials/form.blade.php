<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{!! ucfirst(trans('common.required')) !!}</p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                <label for="date" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.date')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::text('date', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('food') ? 'has-error' : ''}}">
                <label for="food" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.food')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::text('food', null, ['class' => 'form-control', 'maxlength'=>"14"]) !!}
                    {!! $errors->first('food', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('type') ? 'has-error' : ''}}">
                <label for="type" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.type')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('type', ['breakfast'=>'Breakfast','lunch'=>'Lunch','dinner'=>'Dinner'],null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </fieldset>
    </div>
</div>