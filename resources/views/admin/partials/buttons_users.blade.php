<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-4 col-md-8">
            @if(isset($user) )
                <button type="submit" class="btn btn-warning blank_password">{{$label_blank_password}}</button>
            @endif
            @if(!isset($user))
            <button type="submit" class="btn btn-primary">{{$label}}</button>
            @endif
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</div>