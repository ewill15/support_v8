<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">{{ ucfirst(trans('common.modedit_brands')) }}</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <div class="form-group row {{ $errors->has('detail') ? 'has-error' : ''}}">
            {!! Form::label('detail', ucfirst(trans('common.modedit')), ['class' => 'col-md-4 form-control-label text-md-right']) !!}
            <div class="col-md-8">
                {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => '...', 'required', 'autocomplete'=>'off']) !!}
                {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">{{ ucfirst(trans('common.update')) }}</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>