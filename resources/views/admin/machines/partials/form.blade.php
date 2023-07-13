<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                {{ ucfirst(trans('common.data')) }}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PERSONALES  --}}
                            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 form-control-label text-md-right">                                    
                                    {{ ucfirst(trans('common.motherboard')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                  
                            <div class="form-group row {{ $errors->has('processor') ? 'has-error' : ''}}">
                                <label for="processor" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.processor')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('processor', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('processor', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>          

                            <div class="form-group row {{ $errors->has('ip') ? 'has-error' : ''}}">
                                <label for="ip" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.IP')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('ip', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('ip', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('operative_system') ? 'has-error' : ''}}">
                                <label for="operative_system" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.operative_system')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('operative_system', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('operative_system', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('mail_address') ? 'has-error' : ''}}">
                                <label for="mail_address" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.mail_address')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('mail_address', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('mail_address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('office_package') ? 'has-error' : ''}}">
                                <label for="office_package" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.office_package')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('office_package', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('office_package', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('owner') ? 'has-error' : ''}}">
                                <label for="owner" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.owner')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('owner', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('owner', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('other') ? 'has-error' : ''}}">
                                <label for="other" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.other')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::textarea('other', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
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