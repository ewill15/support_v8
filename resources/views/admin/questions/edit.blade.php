@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.questions')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.questions'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/sections/'.$section_id)}}">{{ucfirst(trans('common.sections'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/sections/'.$section_id.'/questions/')}}">{{ucfirst(trans('common.questions'))}}</a>
                </li>
                <li class="active">
                    <strong>{{ucfirst(trans('common.edit'))}}</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        {{ucfirst(trans('common.update'))}} {{ucfirst(trans('common.edit'))}}
                    </h5>
                </div>
                <div class="ibox-content" id="app">
                    {!! Form::model($question, [
                    'method' => 'PATCH',
                    'url'    => 'admin/sections/'.$section_id.'/questions/'.$question->id,
                    'class'  => 'form-horizontal',
                    'files'  => true
                    ]) !!}
                    @include('admin.questions.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
