@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.jobs')))
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.jobs'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/resumes')}}">{{ucfirst(trans('common.job'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/resumes/'.$resume_id.'/jobs')}}">{{ucfirst(trans('common.job'))}}</a>
                </li>
                <li class="active">
                    <strong>{{ucfirst(trans('common.create'))}}</strong>
                </li>
            </ol>
        </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ucfirst(trans('common.form'))}}<small>{{ucfirst(trans('common.job'))}}</small></h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12" id="app">
                                @include('admin.partials.errors', ['errors' => $errors])
                                {!! Form::open([
                                    'url' => 'admin/resumes/'.$resume_id.'/jobs',
                                    'class' => 'form-horizontal',
                                    'files'=>true,
                                    'autocomplete'=>'off'
                                ]) !!}
                                @include('admin.jobs.partials.form', ['errors' => $errors])
                                @include('admin.partials.buttons', ['label' => 'create'])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
