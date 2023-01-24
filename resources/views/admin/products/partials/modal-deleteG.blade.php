<div class="modal fade" id="modalDeleteGallery">
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
                {!! Form::open([ 
                    'id'=>'form-image-gallery',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data', 
                    'class' => 'form-horizontal',
                    'autocomplete'=>'off'
                ]) !!}
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
