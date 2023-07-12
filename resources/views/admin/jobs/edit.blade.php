@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.jobs')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.jobs'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/resumes/'.$resume_id)}}">{{ucfirst(trans('common.resumes'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/resumes/'.$resume_id.'/jobs/'.$job->id)}}">{{ucfirst(trans('common.jobs'))}}</a>
                </li>
                <li class="active">
                    <strong>{{ucfirst(trans('common.edit'))}}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ucfirst(trans('common.update'))}} {{ucfirst(trans('common.edit'))}}</h5>
                </div>
                <div class="ibox-content" id="app">
                    {!! Form::model($job, [
                    'method' => 'PATCH',
                    'url'    => 'admin/resumes/'.$resume_id.'/jobs/'.$job->id,
                    'class'  => 'form-horizontal',
                    'files'  => true
                    ]) !!}
                    @include('admin.jobs.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
