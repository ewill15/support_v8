<div class="modal fade" id="modalShow">
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
                    <i class='fas fa-ban' aria-hidden='true'></i>
                </button>
                <button type="submit" class="btn btn-primary">
                    {{ ucwords(__('common.delete')) }}
                </button>
            </div>
        </div>
    </div>
</div>
