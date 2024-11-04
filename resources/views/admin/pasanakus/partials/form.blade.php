<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                              Datos Pasanaku
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PASANAKU  --}}
                            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    Nombre:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('date_start') ? 'has-error' : ''}}">
                                <label for="date_start" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Fecha Inicio
                                </label>    
                                <div class="col-md-2">
                                    <div class="input-group date" id="date_start" data-target-input="nearest">
                                        {!! Form::text('date_start', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#date_start']) !!}
                                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                                        <div class="input-group-append" data-target="#date_start" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('amount_total') ? 'has-error' : ''}}">
                                <label for="amount_total" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Entrega por participante:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::number('amount_total', null, ['class' => 'form-control', 'placeholder' => '100','min'=>'100']) !!}
                                    {!! $errors->first('amount_total', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                          
                            <div class="form-group row {{ $errors->has('participant_total') ? 'has-error' : ''}}">
                                <label for="participant_total" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Total Participantes:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::number('participant_total', null, ['class' => 'form-control', 'placeholder' => '5','min'=>'5']) !!}
                                    {!! $errors->first('participant_total', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
                                <label for="description" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    Entrega:
                                </label>    
                                <div class="col-md-2">
                                    {!! Form::select('round', ['semanal' => 'Semanal', 'mensual' => 'Mensual'], 'semanal',['class' => 'form-control']) !!}
                                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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