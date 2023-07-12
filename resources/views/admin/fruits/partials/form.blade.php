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

                            <div class="form-group row {{ $errors->has('family') ? 'has-error' : ''}}">
                                <label for="family" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.family')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('family', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.family'))]) !!}
                                    {!! $errors->first('family', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('genus') ? 'has-error' : ''}}">
                                <label for="genus" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.genus')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('genus', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.genus'))]) !!}
                                    {!! $errors->first('genus', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('order') ? 'has-error' : ''}}">
                                <label for="order" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.order')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::text('order', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.order'))]) !!}
                                    {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('carbohydrates') ? 'has-error' : ''}}">
                                <label for="carbohydrates" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.carbohydrates')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('carbohydrates', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.carbohydrates'))]) !!}
                                    {!! $errors->first('carbohydrates', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('protein') ? 'has-error' : ''}}">
                                <label for="protein" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.protein')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('protein', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.protein'))]) !!}
                                    {!! $errors->first('protein', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('fat') ? 'has-error' : ''}}">
                                <label for="fat" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.fat')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('fat', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.fat'))]) !!}
                                    {!! $errors->first('fat', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('calories') ? 'has-error' : ''}}">
                                <label for="calories" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.calories')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('calories', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.calories'))]) !!}
                                    {!! $errors->first('calories', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('sugar') ? 'has-error' : ''}}">
                                <label for="sugar" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.sugar')) }}
                                </label>    
                                <div class="col-md-4 required-name">
                                    {!! Form::number('sugar', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.sugar'))]) !!}
                                    {!! $errors->first('sugar', '<p class="help-block">:message</p>') !!}
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