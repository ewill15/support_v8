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

                            <div class="form-group row {{ $errors->has('first_name') ? 'has-error' : ''}}">
                                <label for="first_name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.firstname')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.firstname'))]) !!}
                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                <label for="last_name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.lastname')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.lastname'))]) !!}
                                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                           
                            <div class="form-group row {{ $errors->has('gender') ? 'has-error' : ''}}">
                                <label for="gender" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.gender')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::select('gender', ['M' => 'Male', 'F' => 'Female'], null, ['class' => 'form-control','placeholder' => ucfirst(trans('common.sel_gender'))]) !!}                                    
                                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
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