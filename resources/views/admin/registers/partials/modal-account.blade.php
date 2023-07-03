<div class="modal fade" id="modal-account-{{$item->id}}">
    {!! Form::model($item, [ 
        'id' => 'form-email',
        'url'=>'admin/users/change_email',
        'method' => 'POST',
        'enctype' => 'multipart/form-data', 
        'class' => 'form-horizontal',
        'autocomplete'=>'off'
    ]) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ucfirst(trans('common.edit_user'))}}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden>x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <input type="hidden" name="id" value="{{@$item->id}}">
                        {!! Form::label('email', 'Correo Electrónico: ', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
                        <div class="col-md-8 required-name">
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => '...', 'required']) !!}
                        </div>
                    </div>
                    <p class="text-primary">
                        {{ ucwords(trans('common.msg_update_pwd')) }}
                    </p> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ ucwords(trans('common.cancel')) }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ ucwords(trans('common.update')) }}
                    </button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>

