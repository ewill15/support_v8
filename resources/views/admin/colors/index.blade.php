@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.colors')))
@section('content')

<!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">{{ ucfirst(trans('common.colors')) }}</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">
                                            {{ ucfirst(trans('common.home')) }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        {{ ucfirst(trans('common.colors')) }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-outline-primary float-right">
                            <i class="fas fa-plus-circle"></i>
                            {{ ucfirst(trans('common.create')) }}
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->

      </section>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials.messages')
            @include('admin.partials.errors', ['errors' => $errors])

            <div class="card card-primary card-outline">
                <div class="card-body">
                <!-- ============================================================== -->
                <!-- Form searchs -->   
                    <div class="card">
                        {!! Form::open([
                            'url' => 'admin/colors', 
                            'method' => 'GET', 
                            'enctype' => 'multipart/form-data', 
                            'class' => 'form-horizontal pt-3',
                            'autocomplete'=>'off'
                        ]) !!}
                        <div class="w-50 float-left">
                            <div class="align-self-center p-2 db-highlight">
                                <span id="date-label-to" class="date-label col-md-4 form-control-label">{{ ucfirst(trans('common.display')) }}</span>
                                {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display custom-select custom-select-sm col-md-4 form-control-sm']) !!}
                                <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{ ucfirst(trans('common.records')) }}</span>
                            </div>
                        </div>  
                        
                        <div class="w-50 float-right">
                            <div class="align-self-center p-2 bd-highlight">
                                {!! Form::text('search', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                            </div>
                            <div class="align-self-center p-2-bd-highlight">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>    
                        {!! Form::close() !!}
                    </div> 
                <!-- End form searchs --> 
                <!-- ============================================================== -->  
                <!-- ============================================================== --> 
                <!-- Table  --> 
                    <div class="ibox-content">
                        <div class="table-responsive"> 
                            <table class="table table-register table-striped table-bordered table-hover">                                        
                                <thead>
                                <tr>
                                    <th class="actions">ID</th>
                                    <th>{{ ucfirst(trans('common.name')) }}</th>
                                    <th>{{ ucfirst(trans('common.short_name')) }}</th>
                                    <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $item)
                                    <tr class="gradeX">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->name }}</td>
                                        <td>{{ @$item->short_name }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    {{ ucfirst(trans('common.actions')) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a href="{{ url('admin/colors/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="{{$item->name}}" 
                                                            data-url="{{ route('colors.destroy', $item->id) }}" 
                                                            data-title-msg="{{ ucfirst(trans('common.delete')) }}" 
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}"
                                                            data-btn-cancel="{{ ucfirst(trans('common.cancel')) }}"
                                                        >
                                                            <i class="fas fa-trash-alt"></i> {{ ucfirst(trans('common.delete')) }}
                                                        </a>
                                                </div>
                                            </div>       
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('admin.colors.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $colors->appends(request()->except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End table --> 
                <!-- ============================================================== --> 
                </div>
            </div>
        </div>
    </section>
@endsection
