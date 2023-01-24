<div class="modal fade" id="modalRestore">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open([
            'id'=>'form-restore',
            'method'=>'post'
        ]) !!}
        <div class="modal-body">
            <div class="form-group row {{ $errors->has('detail') ? 'has-error' : ''}}">
                {!! Form::label('detail', ucfirst(trans('common.restore_text')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                <div class="col-md-8">
                    {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-default" data-dismiss="modal"></button>
            <button type="submit" class="btn btn-info item-restore"></button>
        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
