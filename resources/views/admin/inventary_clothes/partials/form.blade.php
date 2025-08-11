<div class="row">
    <div class="col-lg-12 mb-20">
        <p>{{ucfirst(trans('common.field'))}}  (
            <span class="text-danger">*</span>
            ) {{ucfirst(trans('common.required'))}}
        </p>
    </div>
    <div class="col-lg-10">
        <fieldset>
            <div class="form-group row {{ $errors->has('date_in') ? 'has-error' : ''}}">
                <label for="date_in" class="col-md-4 form-control-label text-md-right">
                    {{ ucfirst(trans('validation.attributes.date')) }}
                </label>    
                <div class="col-md-4 required-name">
                    <div class="input-group date" id="date_in" data-target-input="nearest" style="position: relative;">
                        {!! Form::text('date_in', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#date_in']) !!}
                        {!! $errors->first('date_in', '<p class="help-block">:message</p>') !!}
                        <div class="input-group-append" data-target="#date_in" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.description')).':' }}
                </label>    
                <div class="col-md-7">
                    {!! Form::textarea('description', null, ['class' => 'form-control', "required"]) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('size') ? 'has-error' : ''}}">
                <label for="size" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.size')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('size', [1=>'0m',2=>'3m',3=>'6m',4=>'12m'], null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
                </div>
            </div>           
            <div class="form-group row {{ $errors->has('buy_price') ? 'has-error' : ''}}">
                <label for="buy_price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.buy_price')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::number('buy_price', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('buy_price', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('sale_price') ? 'has-error' : ''}}">
                <label for="sale_price" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.sale_price')) }}
                    <span>({{ucfirst(trans('validation.attributes.suggested')) }}) :</span>
                </label>
                <div class="col-md-7">
                    {!! Form::number('sale_price', null, ['class' => 'form-control','required']) !!}
                    {!! $errors->first('sale_price', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('code') ? 'has-error' : ''}}">
                <label for="code" class="col-md-4 form-control-label text-right">
                    <span class="text-danger">*</span>
                    {{ ucfirst(trans('validation.attributes.code')).':' }}
                </label>
                <div class="col-md-7">
                    {!! Form::select('code', $code_list, null, ['class' => 'form-control select2','required' => 'required']) !!}
                    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
        </fieldset>
    </div>
</div>