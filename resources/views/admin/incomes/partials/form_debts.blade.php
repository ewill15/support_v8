<legend>
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <input type="hidden" name="saldo" value="{{$income->saldo}}"/>
                <input type="hidden" name="income_id" value="{{$income->id}}"/>
                <div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
                    <label for="date" class="col-md-4 form-control-label text-md-right">
                        <span class="text-danger">*</span>
                        {{ ucfirst(trans('common.dateform')) }}
                    </label>
                    <div class="col-md-8 required-name">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            {!! Form::text('date', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#reservationdate']) !!}
                            {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="form-group row {{ $errors->has('payment_id') ? 'has-error' : ''}}">
                    {!! Form::label('payments', ucfirst(trans('common.payments')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="input-group col-md-8">
                        {!! Form::select('payment_id', $payments, null, ['class' => 'form-control select2', 'style'=>'width: 100%;']) !!}
                        {!! $errors->first('payment_id', '<small class="form-text text-danger">:message</small>') !!}
                    </div>
                </div> 
                <div class="form-group row {{ $errors->has('nro_payment') ? 'has-error' : ''}}">
                    {!! Form::label('nro_payment', ucfirst(trans('common.nro_payment')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('nro_payment', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('nro_payment', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('on_account') ? 'has-error' : ''}}">
                    {!! Form::label('on_account', ucfirst(trans('common.on_account')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::text('on_account', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('on_account', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                    {!! Form::label('description', ucfirst(trans('common.description')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</legend>
