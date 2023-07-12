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
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.firstname')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.firstname'))]) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                  
                            <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                <label for="last_name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.lastname')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.lastname'))]) !!}
                                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                                      
                            <div class="form-group row {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                <label for="mobile" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.mobile')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('mobile', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.email')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label for="password" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.password')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('dob') ? 'has-error' : ''}}">
                                <label for="dob" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.dob')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    <div class="input-group date" id="dob" data-target-input="nearest">
                                        {!! Form::text('dob', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#dob']) !!}
                                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                        <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
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