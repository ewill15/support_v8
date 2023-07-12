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
                            <div class="form-group row {{ $errors->has('capital') ? 'has-error' : ''}}">
                                <label for="capital" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.capital')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('capital', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.capital'))]) !!}
                                    {!! $errors->first('capital', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('region') ? 'has-error' : ''}}">
                                <label for="region" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.region')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('region', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.region'))]) !!}
                                    {!! $errors->first('region', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>     

                            <div class="form-group row {{ $errors->has('languages') ? 'has-error' : ''}}">
                                <label for="languages" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.languages')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('languages', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.languages'))]) !!}
                                    {!! $errors->first('languages', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('subregion') ? 'has-error' : ''}}">
                                <label for="subregion" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.subregion')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('subregion', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.subregion'))]) !!}
                                    {!! $errors->first('subregion', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row {{ $errors->has('timezone') ? 'has-error' : ''}}">
                                <label for="timezone" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.timezone')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('timezone', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.timezone'))]) !!}
                                    {!! $errors->first('timezone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                  
                            <div class="form-group row {{ $errors->has('continent') ? 'has-error' : ''}}">
                                <label for="continent" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.continent')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('continent', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.continent'))]) !!}
                                    {!! $errors->first('continent', '<p class="help-block">:message</p>') !!}
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