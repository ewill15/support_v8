<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data">
                                {{ ucfirst(trans('common.tabs1_client')) }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="custom-tabs-three-client-data-tab" href="#custom-tabs-three-client-data" role="tab" aria-controls="custom-tabs-three-client-data">
                                {{ ucfirst(trans('common.tabs2_client')) }}
                            </a>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PERSONALES  --}}
                        <div class="tab-pane fade show active" id="custom-tabs-three-user-data" role="tabpanel" aria-labelledby="custom-tabs-three-user-data-tab">
                            <div class="form-group row {{ $errors->has('name_lastname') ? 'has-error' : ''}}">
                                    <label for="name_lastname" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.name_lastname')) }}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        {!! Form::text('name_lastname', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        {!! $errors->first('name_lastname', '<p class="help-block">:message</p>') !!}
                                    </div>
                            </div>   
                            <div class="form-group row {{ $errors->has('dni') ? 'has-error' : ''}}">
                                {!! Form::label('dni', ucfirst(trans('common.dni')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('dni', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                     
                            <div class="form-group row {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                    <label for="mobile" class="col-md-4 form-control-label text-md-right">
                                        <span class="text-danger">*</span>
                                        {{ ucfirst(trans('common.nro_mobile')) }}
                                    </label>
                                    <div class="col-md-8 required-name">
                                        {!! Form::number('mobile', null, ['class' => 'form-control ', 'placeholder' => '...']) !!}
                                        {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                    </div>
                            </div>
                            <div class="form-group row {{ $errors->has('phone') ? 'has-error' : ''}}">
                                    {!! Form::label('phone', ucfirst(trans('common.nro_phone')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                    <div class="col-md-8">
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                    </div>
                            </div>
                            <div class="form-group row {{ $errors->has('address') ? 'has-error' : ''}}">
                                <label for="address" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ucfirst(trans('common.address'))}}
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            {{-- button next --}}
                            <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary bnext-client">{{ ucfirst(trans('common.next')) }}</button>
                                    </div>                                
                            </div>                           
                        </div>
                        {{-- DATOS PROVEEDOR --}}
                        <div class="tab-pane fade" id="custom-tabs-three-client-data" role="tabpanel" aria-labelledby="custom-tabs-three-client-data-tab">
                    
                            <div class="form-group row {{ $errors->has('provider_name') ? 'has-error' : ''}}">
                                <label for="provider_name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ucfirst(trans('common.client_fac'))}}
                                </label>
                                <div class="col-md-8 required-name">
                                    {!! Form::text('provider_name', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('provider_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('nit') ? 'has-error' : ''}}">
                                {!! Form::label('nit', ucfirst(trans('common.nit')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::number('nit', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('nit', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                {!! Form::label('description', ucfirst(trans('common.observation')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                <div class="col-md-8">
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            @if(isset($var_dr))
                            <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                                {!! Form::label('state_id', ucfirst(trans('common.state')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                                
                                <div class="input-group col-md-8">
                                    {!! Form::select('state_id', $states, null, ['class' => 'form-control wide','required' => 'required']) !!}
                                    {!! $errors->first('state_id', '<small class="form-text text-danger">:message</small>') !!}
                                </div>
                            </div>
                            @endif
                            {{-- SEND FORM --}}
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-primary bprev-client-step2">
                                        {{ ucfirst(trans('common.previous')) }}
                                    </button>
                                    @if(isset($var_dr))
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                        {{ ucfirst(trans('common.edit')) }}
                                    </button>
                                    @include('admin.clients.partials.modal-edit')
                                    @else
                                    <button type="button" class="btn btn-primary btn-send-form" data-btn="client">
                                        {{ ucfirst(trans('common.create')) }} 
                                    </button>     
                                    @endif
                                    <a href="{{ URL::previous() }}" class="btn btn-default">{{ ucfirst(trans('common.cancel')) }}</a>
                                </div>                                
                            </div>
                        </div>
                        
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                
            </fieldset>
        </div>
    </div>
    
</legend>