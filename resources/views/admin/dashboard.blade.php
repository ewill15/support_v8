@extends('layouts.admin.app')
@section('content')    
    <div class="row p-5">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1">
                    <i class="fas fa-users"></i>
                </span>
      
                <div class="info-box-content">
                    <span class="info-box-text">{{ ucfirst(trans('common.users')) }}</span>
                    <span class="info-box-number">
                    {{$register['users']}}
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                    <i class="fas fa-palette"></i>
                </span>
      
                <div class="info-box-content">
                    <span class="info-box-text">{{ ucfirst(trans('common.colors')) }}</span>
                    <span class="info-box-number">
                        {{$register['colors']}}    
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
      
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1">
                    <i class="fas fa-globe"></i>
                </span>
      
                <div class="info-box-content">
                    <span class="info-box-text">{{ ucfirst(trans('common.countries')) }}</span>
                    <span class="info-box-number">
                        {{$register['countries']}}
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                    <i class="fas fa-hamburger"></i>
                </span>
        
                <div class="info-box-content">
                    <span class="info-box-text">{{ ucfirst(trans('common.foods')) }}</span>
                    <span class="info-box-number">
                        {{$register['foods']}}
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1">
                    <i class="fas fa-lemon"></i>
                </span>
      
                <div class="info-box-content">
                    <span class="info-box-text">{{ ucfirst(trans('common.fruits')) }}</span>
                    <span class="info-box-number">
                        {{$register['fruits']}}
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    </div>
@endsection