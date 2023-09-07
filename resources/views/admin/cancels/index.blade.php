@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')))
@section('content')

    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        @include('admin.partials.breadcrumb',[
                            'action'=>'simple',
                            'title'=>ucfirst(trans('common.cancels')), 
                            'breadcrumb_text'=>ucfirst(trans('common.cancels')),
                            'breadcrumb_url'=>url('admin/cancels'),
                            'item_breadcrumb'=>ucfirst(trans('common.list'))
                        ])
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-body border-top">
                        <a href="{{ url('admin/cancels/create') }}" class="btn btn-outline-primary float-right">
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
                            'url' => 'admin/cancels', 
                            'method' => 'GET', 
                            'enctype' => 'multipart/form-data', 
                            'class' => 'form-horizontal pt-3',
                            'autocomplete'=>'off'
                        ]) !!}
                        <div class="card d-flex flex-row justify-content-around p-5">
                            <div class="flex-grow-1">
                                <span id="date-label-to" class="date-label col-md-4 form-control-label">{{ ucfirst(trans('common.display')) }}</span>
                                {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display custom-select custom-select-sm col-md-4 form-control-sm']) !!}
                                <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{ ucfirst(trans('common.records')) }}</span>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex flex-row">
                                    <div class="flex-grow-1"> 
                                        {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                                    </div>                                
                                    <div class="flex-grow-1"> 
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>                                    
                                </div>
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
                                    <th>ID</th>                                
                                    <th>{{ucfirst(trans('common.service'))}}</th>
                                    <th>{{ucfirst(trans('common.period'))}} (m-Y)</th>
                                    <th>{{ucfirst(trans('common.ammount'))}}</th>
                                    <th>{{ucfirst(trans('common.actions'))}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cancels as $item)
                                    <tr class="gradeX">
                                        <td>{{ @$item->id }}</td>
                                        <td>{{ @$item->service->name }}</td>
                                        <td>{{ @$item->period }}</td>
                                        <td>{{ @$item->ammount }}</td>
                                        <td>
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    {{ ucfirst(trans('common.actions')) }}
                                                </button>
                                                <div class="dropdown-menu">
                                                        <a href="{{ url('admin/cancels/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                            <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"
                                                            data-action="delete"
                                                            data-name="{{$item->name}}" 
                                                            data-url="{{ route('cancels.destroy', $item->id) }}" 
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
                            @include('admin.cancels.partials.modal-delete')
                            <div class="float-left">
                                {{ $text_pagination }}
                            </div>
                            <div class="float-right">                                        
                                <div class="btn-group">
                                  {!! $cancels->appends(request()->except('page'))->links() !!}
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


@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.cancels')))
@section('content')
        <div class="col-lg-12">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        </div>
        <div class="col-lg-10">
            <h2>{{ucfirst(trans('common.cancels'))}}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('admin/home')}}">{{ucfirst(trans('common.home'))}}</a>
                </li>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ucfirst(trans('common.cancels'))}}</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/cancels/create') }}">
                            <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus-circle"></i>
                                {{ucfirst(trans('common.new'))}}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <form  id="paginate" action="{{ url('admin/cancels') }}">
                            <div class="card d-flex flex-row justify-content-around p-5">
                                <div class="flex-grow-1">
                                    <span id="date-label-to" class="date-label col-md-4 form-control-label">{{ ucfirst(trans('common.display')) }}</span>
                                    {!! Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display custom-select custom-select-sm col-md-4 form-control-sm']) !!}
                                    <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{ ucfirst(trans('common.records')) }}</span>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-row">
                                        <div class="flex-grow-1"> 
                                            {!! Form::text('keyword', null, ['class' => 'form-control form-control-sm', 'placeholder' => ucfirst(trans('common.search')).'...']) !!}
                                        </div>                                
                                        <div class="flex-grow-1"> 
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>                                
                                <th>{{ucfirst(trans('common.name'))}}</th>
                                <th>{{ucfirst(trans('common.actions'))}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cancels as $item)                            
                                <tr class="gradeX">
                                    <td>{{ @$item->id }}</td>                                    
                                    <td>{{ @$item->name }}</td>
                                    <td>
                                        <a href="{{ url('admin/cancels/' . @$item->id . '/edit') }}">
                                            <button type="submit" class="btn btn-primary btn-xs">{{ucfirst(trans('common.update'))}}</button>
                                        </a> 
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['admin/cancels', @$item->id],
                                            'style' => 'display:inline',
                                            'onsubmit' => 'return confirm("ucfirst(trans(\'common.deletes.bank\'))")'
                                        ]) !!}
                                        <input type="submit" class="btn btn-danger btn-xs" value="{{ucfirst(trans('common.delete'))}}">
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p>{{ $text_pagination }}</p>
                    {!! $cancels->appends(request()->except('page'))->render() !!}
                </div>
            </div>
        </div>
@endsection
