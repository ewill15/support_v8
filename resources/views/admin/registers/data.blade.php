@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.webs')))
@section('content')
    <section class="content">
        <div class="container-fluid">
            <p>User: {{$result['user']}}</p>
            <p>Password: {{$result['password']}}</p>
        </div>
    </section>
@endsection
