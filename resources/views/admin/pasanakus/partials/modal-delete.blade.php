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
                    <p class="text-detail"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ ucwords(trans('common.cancel')) }}
                        {{ ucwords(trans('common.delete')) }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ ucwords(trans('common.delete')) }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
