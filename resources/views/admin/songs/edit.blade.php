@extends('layouts.cms.app')
@section('title', ucfirst(trans('common.songs')))
@section('content')
    <div class="row  border-bottom white-bg dashboard-header">  
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.songs'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
                <li>
                    <a href="{{url('admin/songs')}}">{{ucfirst(trans('common.songs'))}}</a>
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
                    {!! Form::model($song, [
                    'method' => 'PATCH',
                    'url'    => ['admin/songs', $song->id],
                    'class'  => 'form-horizontal',
                    'files'  => true
                    ]) !!}
                    @include('admin.songs.partials.form', ['errors' => $errors])
                    @include('admin.partials.buttons', ['label' => 'save'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
