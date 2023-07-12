@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.user')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.user'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/users')}}">{{ucfirst(trans('common.user'))}}</a>
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
                    {!! Form::model($items, [
                    'method' => 'PATCH',
                    'url'    => ['admin/users', $items->id],
                    'class'  => 'form-horizontal',
                    'files'  => true
                    ]) !!}
                    @include('admin.users.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
