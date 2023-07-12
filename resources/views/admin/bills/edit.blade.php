@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.bills')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.bills'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/users')}}">{{ucfirst(trans('common.bills'))}}</a>
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
                        {{ucfirst(trans('common.update'))}} 
                        <small>
                        {{ucfirst(trans('common.edit'))}}
                        </small>
                        
                    </h5>
                </div>
                <div class="ibox-content" id="app">
                    {!! Form::model($bill, [
                    'method' => 'PATCH',
                    'url'    => ['admin/bills', $bill->id],
                    'class'  => 'form-horizontal',
                    'files'  => true
                    ]) !!}
                    @include('admin.bills.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
