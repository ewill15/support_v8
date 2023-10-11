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
                            <div class="form-group row">
                                <label for="page" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.type')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('type', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                </div>
                            </div>                         
                            <div class="form-group row {{ $errors->has('username') ? 'has-error' : ''}}">
                                <label for="username" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.username')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('username', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('password') ? 'has-error' : ''}}">
                                <label for="password" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.password')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.confirm_password')) }}
                                </label>
                                <div class="col-md-4">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
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