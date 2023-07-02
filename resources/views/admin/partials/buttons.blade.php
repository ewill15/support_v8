<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-4 col-md-10 text-center">
            @if (!isset($label))
                <button type="submit" class="btn btn-primary" >{{ ucfirst(trans('common.create')) }}</button>    
            @else
                <button type="submit" class="btn btn-primary" >{{ ucfirst(trans('common.update')) }}</button>
            @endif            
            <a href="{{ URL::previous() }}" class="btn btn-inverse">{{ ucfirst(trans('common.cancel')) }}</a>
        </div>
    </div>
</div>