@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.dictionaries')))
@section('content')
        <div class="col-lg-12">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        </div>
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.dictionaries'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ucfirst(trans('common.dictionaries'))}}</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/dictionaries/create') }}">
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus-circle"></i>
                                {{ucfirst(trans('common.new'))}}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <form  id="paginate" action="{{ url('admin/dictionaries') }}">
                            <div class="form-group">
                                <span id="date-label-to" class="date-label">{{ucfirst(trans('common.display'))}}</span>
                                    {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display']) !!}
                                <span id="date-label-to" class="date-label">{{ucfirst(trans('common.records'))}} </span>
                            </div>
                            <input type="text" class="pull-right" name="keyword">
                            <button type="submit" class="btn btn-primary btn-xs pull-right">
                                <i class="fa fa-search"></i>
                                {{ucfirst(trans('common.search'))}}
                            </button>
                        </form>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>                                
                                <th>{{ucfirst(trans('common.word'))}}</th>
                                <th>{{ucfirst(trans('common.meaning'))}}</th>
                                <th>{{ucfirst(trans('common.example'))}}</th>
                                <th>{{ucfirst(trans('common.actions'))}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dictionaries as $item)                            
                                <tr class="gradeX">
                                    <td>{{ @$item->id }}</td>                                    
                                    <td>{{ @$item->word }}</td>
                                    <td>{{ @$item->meaning }}</td>
                                    <td>{{ @$item->example }}</td>
                                    <td>
                                        <a href="{{ url('admin/dictionaries/' . @$item->id . '/edit') }}">
                                            <button type="submit" class="btn btn-primary btn-xs">{{ucfirst(trans('common.update'))}}</button>
                                        </a> 
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/dictionaries', @$item->id],
                                            'style' => 'display:inline',
                                            'onsubmit' => 'return confirm("ucfirst(trans(\'common.deletes.dictionary\'))")'
                                        ]) !!}
                                        <input type="submit" class="btn btn-danger btn-xs" value="{{ucfirst(trans('common.delete'))}}">
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p>{{ $text_pagination }}</p>
                    {!! $dictionaries->appends(request()->except('page'))->render() !!}
                </div>
            </div>
        </div>
@endsection
