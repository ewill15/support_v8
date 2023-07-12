<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-4 col-md-10 text-center">
            <button type="submit" class="btn btn-primary">{{ucfirst(trans('validation.attributes.'.$label))}}</button>
            <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ucfirst(trans('validation.attributes.cancel'))}}</a>
        </div>
    </div>
</div>