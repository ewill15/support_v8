<div class="modal fade" id="modalAdd">
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-10">
                        <fieldset>
                            <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.firstname')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.firstname'))]) !!}
                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                  
                            <div class="form-group row {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                <label for="last_name" class="col-md-4 form-control-label text-md-right">
                                    <span class="text-danger">*</span>
                                    {{ ucfirst(trans('common.lastname')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => ucfirst(trans('common.lastname'))]) !!}
                                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>                                                      
                            <div class="form-group row {{ $errors->has('cellphone') ? 'has-error' : ''}}">
                                <label for="cellphone" class="col-md-4 form-control-label text-md-right">
                                    {{ ucfirst(trans('common.cellphone')) }}
                                </label>    
                                <div class="col-md-4">
                                    {!! Form::text('cellphone', null, ['class' => 'form-control', 'placeholder' => '...']) !!}
                                    {!! $errors->first('cellphone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ ucwords(trans('common.cancel')) }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ ucwords(trans('common.delete')) }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
