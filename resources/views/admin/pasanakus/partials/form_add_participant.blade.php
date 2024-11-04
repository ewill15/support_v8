<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                              Registrar participantes en {{$pasanaku->name}}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                      <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PASANAKU  --}}
                            <div class="form-group row">
                                
                                <label for="remainig" class="col-md-4 form-control-label">
                                    Participantes a registrar: {{$user_registered}}
                                </label>
                                @if ($pasanaku->participant_total - $user_registered)
                                    <label for="remainig" class="col-md-4 form-control-label">
                                        Participantes registrados: {{$pasanaku->participant_total - $user_registered}}
                                    </label>    
                                @endif
                            </div>
                            
                            @php
                                $counter = $user_id_next_registered+1;
                            @endphp
                            
                            <div class="form-group row">
                                @while ($counter<=$pasanaku->participant_total)
                                    <div class="col-md-2 d-flex justify-content-around m-3">
                                        <span class="font-28">{{$counter}}</span>
                                        {!! Form::hidden('turn', $counter, ['class' => 'form-control','name'=>'turn[]']) !!}
                                        {!! Form::select('user_id', $users, null,['class' => 'form-control select2 col-md-10','name'=>'user_id[]', 'autocomplete' => 'off', 'aria-describedby' => 'users']) !!}
                                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    @php
                                        $counter++;
                                    @endphp
                                @endwhile
                               
                            </div>
                      </div>
                    </div>
                    <!-- /.card -->
                </div>    
            </fieldset>
        </div>
    </div>
</legend>