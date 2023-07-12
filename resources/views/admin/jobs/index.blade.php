@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.jobs')))
@section('content')
        <div class="col-lg-12">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        </div>
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.job'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/resumes')}}">{{ucfirst(trans('common.resume'))}}</a>
                </li>
                <li>
                    <strong>{{ucfirst(trans('common.job'))}}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ucfirst(trans('common.job'))}}</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/resumes/'.$resume_id.'/jobs/create') }}">
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus-circle"></i>
                                {{ucfirst(trans('common.new'))}}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <form  id="paginate" action="{{ url('admin/jobs') }}">
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
                                <th>{{ucfirst(trans('common.date_start'))}}</th>
                                <th>{{ucwords(trans('common.date_end'))}}</th>                                
                                <th>{{ucfirst(trans('common.company'))}}</th>
                                <th>{{ucfirst(trans('common.actions'))}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $item)
                                <tr class="gradeX">
                                    <td>{{ @$item->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$item->start)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse(@$item->end)->format('d-m-Y') }}</td>
                                    <td>{{ @$item->company }}</td>
                                    <td>
                                        <a href="{{ url('admin/ressumes/'.$resume_id.'/jobs/' . @$item->id . '/edit') }}">
                                            <button type="submit" class="btn btn-primary btn-xs">{{ucfirst(trans('common.update'))}}</button>
                                        </a> 
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => 'admin/resumes/'.$resume_id.'/jobs/'. @$item->id,
                                            'style' => 'display:inline',
                                            'onsubmit' => 'return confirm("ucfirst(trans(\'common.deletes.job\'))")'
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
                    {!! $jobs->appends(request()->except('page'))->render() !!}
                </div>
            </div>
        </div>
@endsection
