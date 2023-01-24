<div class="modal fade" id="modalEditGallery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden>x</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open([
                    'method' => 'POST', //aqui siempre sera GET o POST nada mas
                    'enctype' => 'multipart/form-data', 
                    'class' => 'form-horizontal',
                    'autocomplete'=>'off'
                ]) !!}
                <p class="text-detail">
                    {!! Form::radio('name', 'value', true) !!}
                </p>
                <div class="form-group row {{ $errors->has('state_id') ? 'has-error' : ''}}">
                    {!! Form::label('serial_control', 'Imagen visible: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                    <div class="col-md-8">
                        
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline mr-3">
                                
                                {!! Form::radio('state_id', 0, null,  ['id'=>'radioPrimary1','class' => 'form-control-label i-checks']) !!}
                                {!! Form::label('radioPrimary1', 'No ', ['class' => 'col-md-2', 'for'=>'radioPrimary1']) !!}
                                {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="icheck-primary d-inline">
                                {!! Form::radio('state_id', 1, null,  ['id'=>'radioPrimary2','class' => 'form-control-label i-checks']) !!}
                                {!! Form::label('radioPrimary2', 'Si ', ['class' => 'col-md-2', 'for'=>'radioPrimary2']) !!}
                                {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                            </div>
                          </div>
                    </div>
                </div>
               <input type="hidden" name="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    {{ucfirst(trans('common.close'))}}
                </button>
                <button type="submit" class="btn btn-primary">
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
