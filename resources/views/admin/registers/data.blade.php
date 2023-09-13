@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.webs')))
@section('content')
<legend>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-user-data-tab" data-toggle="pill" href="#custom-tabs-three-user-data" role="tab" aria-controls="custom-tabs-three-user-data" aria-selected="true">
                                {{$result['page']}}
                            </a>
                        </li>
                      </ul>                  
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                          {{-- DATOS PERSONALES  --}}                          
                            <div class="form-group row justify-content-center">
                                <label>Page:</label>
                                <span class="ml-2">{{$result['page']}}</span>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label>Url:</label>
                                <span class="ml-2">{{$result['url']}}</span>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label>User:</label>
                                <span class="ml-2">{{$result['username']}}</span>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label>Password:</label>
                                <span class="ml-2">{{$result['password']}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                  </div>    
            </fieldset>
        </div>
    </div>
</legend>
@endsection
