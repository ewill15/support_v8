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

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-success elevation-1">
          <i class="fas fa-users"></i>
        </span>

        <div class="info-box-content">
          <span class="info-box-text">{{ ucfirst(trans('common.database')) }}</span>
          <span class="info-box-number">
            <a class="btn btn-block btn-outline-success" href="/admin/export" target="_blank" rel="noopener noreferrer">
              {{ ucfirst(trans('common.full')) }}
            </a>
            <a class="disabled btn btn-block btn-outline-success" href="/admin/export-table?table_name=users" target="_blank" rel="noopener noreferrer">
              user Table
            </a>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div>
</div>
@endsection