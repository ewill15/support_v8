{!! Form::open([
    'id'=>'paginate',
    'url' => $url, 
    'method' => 'GET', 
    'enctype' => 'multipart/form-data', 
    'class' => 'form-horizontal pt-3',
    'autocomplete'=>'off'
]) !!}  
    <div class="card d-flex flex-row justify-content-around p-5">
        <div class="flex-grow-1">
            <span id="date-label-to" class="date-label col-md-4 form-control-label">{{ ucfirst(trans('common.display')) }}</span>
            {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display custom-select custom-select-sm col-md-4 form-control-sm']) !!}
            <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{ ucfirst(trans('common.records')) }}</span>
        </div>
        <div class="flex-grow-1">
            <div class="d-flex flex-row">
                @if ($section == 'lunches')
                    <div class="input-group date col-md-4 p-0" id="lunch_search" data-target-input="nearest">
                        {!! Form::text('lunch_search', null, ['class' => 'form-control datetimepicker-input', 'name'=>'keyword', 'data-target' => '#lunch_search']) !!}
                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                        <div class="input-group-append" data-target="#lunch_search" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-search"></i>
                    </button>
                @else
                    <div class="flex-grow-1"> 
                        {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm', 'placeholder' => isset($example)?$example:ucfirst(trans('common.search')).'...']) !!}
                    </div>
                    <div class="flex-grow-1"> 
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>   
                @endif
            </div>
            @if ($section == 'drinks')
                <div class="d-flex flex-row">
                    <div class="form-check form-check-inline">
                        @foreach ($types_list as $key=>$type)
                        <div class="icheck-primary d-inline ml-2">
                            <input type="radio" id="{{$type}}" name="key_type" value="{{$key}}">
                            <label for="{{$type}}">
                                {{ucfirst($type)}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>    
            @endif
        </div>
    </div> 
{!! Form::close() !!}