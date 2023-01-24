<div class="modal fade" id="modalDelete">
    <form action="" method="POST">
        {{ method_field('DELETE') }}
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
                    <p>
                        {{ ucfirst(trans('common.msgdelete')) }}<strong> {{ $item->name_sucursal }}</strong>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ ucfirst(trans('common.close')) }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ ucfirst(trans('common.confirm')) }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
