@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.products')))
@section('content')
<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">{{ ucfirst(trans('common.products')) }}</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">
                                        {{ ucfirst(trans('common.home')) }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ ucfirst(trans('common.list_products')) }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                @if(@$new)
                <div class="card-body border-top">
                    <a href="{{ url('admin/products/create') }}" class="btn btn-outline-primary float-right">
                        <i class="fas fa-plus-circle"></i>
                        {{ ucfirst(trans('common.create')) }}
                    </a>
                </div>
                @endif
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
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-primary card-outline">
                    {{-- <h5 class="card-header">{{ucfirst(trans('common.products'))}}</h5> --}}
                    <div class="card-body">
                        <!-- ============================================================== -->
                        <!-- Form searchs -->
                        <div class="card">
                            {!! Form::open([
                            'id' => 'form-product-search',
                            'url' => 'admin/products',
                            'method' => 'GET',
                            'enctype' => 'multipart/form-data',
                            'class' => 'form-horizontal pt-3',
                            'autocomplete'=>'off'
                            ]) !!}
                            <div class="row">
                                <div class="col-md-12 form-group row mt-4">
                                    <div class="col-md-6 pl-5">
                                        <span id="date-label-to" class="date-label col-md-4 form-control-label">{{
                                            ucfirst(trans('common.display')) }}</span>
                                        {!!
                                        Form::select('pagination',['10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'],$paginate,['class'=>'display
                                        custom-select custom-select-sm col-md-4 form-control-sm']) !!}
                                        <span id="date-label-to" class="date-label col-md-4 form-control-label"> {{
                                            ucfirst(trans('common.records')) }}</span>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col mt-3 pl-5">
                                        {!! Form::label('product_name', ucfirst(trans('common.search_name_product')) ,
                                        ['class' => 'col form-control-label']) !!}
                                        {!! Form::text('product_name', null, ['class' => 'form-control', 'placeholder'
                                        => 'Buscar...']) !!}
                                    </div>
                                    <div class="col mt-3">
                                        {!! Form::label('brand', ucfirst(trans('common.brand')), ['class' => 'col
                                        form-control-label']) !!}
                                        {!! Form::select('brand', [''=>'Selección...', $brands], null, ['class' =>
                                        'form-control select2']) !!}
                                    </div>
                                    <div class="col mt-3">
                                        {!! Form::label('prototype', ucfirst(trans('common.prototype')), ['class' =>
                                        'col form-control-label']) !!}
                                        {!! Form::select('prototype', [''=>'Seleccionar...', $prototypes], null,
                                        ['class' => 'form-control select2']) !!}
                                    </div>
                                    <div class="col mt-3">
                                        {!! Form::label('category', ucfirst(trans('common.category')), ['class' => 'col
                                        form-control-label']) !!}
                                        {!! Form::select('category', [''=>'Seleccionar...', $categories], null, ['class'
                                        => 'form-control select2']) !!}
                                    </div>
                                    <div class="col mt-3">
                                        {!! Form::label('type_product', ucfirst(trans('common.type_product')), ['class'
                                        => 'col form-control-label']) !!}
                                        {!! Form::select('type_product', [''=>'Seleccionar...', $types], null, ['class'
                                        => 'form-control select2']) !!}
                                    </div>
                                    <div class="col mt-3">
                                        {!! Form::label('state', ucfirst(trans('common.state')), ['class' => 'col
                                        form-control-label']) !!}
                                        {!! Form::select('state', [''=>'Seleccionar...', $states], null, ['class' =>
                                        'form-control select2']) !!}
                                    </div>
                                    <div class="col mt-5">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- End form searchs -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->


                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table id="product"
                                    class="table table-striped table-bordered table-hover table-register">
                                    <thead>
                                        <tr>
                                            <th class="actions">ID</th>
                                            <th>{{ ucfirst(trans('common.name_product')) }}</th>
                                            <th>{{ ucfirst(trans('common.brand')) }}</th>
                                            <th>{{ ucfirst(trans('common.prototype')) }}</th>
                                            <th>{{ ucfirst(trans('common.category')) }}</th>
                                            <th>{{ ucfirst(trans('common.type_product')) }}</th>
                                            <th>{{ ucfirst(trans('common.state')) }}</th>
                                            <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $item)
                                        <tr class="gradeX {{$item->deleted_at?'text-danger':''}}">
                                            <td>{{ @$item->id }}</td>
                                            <td>{{ @$item->productName }}</td>
                                            <td>{!! @$item->brand->name_brand !!}</td>
                                            <td>{!! @$item->prototype->name_prototype !!}</td>
                                            <td>{!! @$item->category->name_category !!}</td>
                                            <td>{!! @$item->type->name_type !!}</td>
                                            <td>{!! @$item->state->name_state !!}</td>
                                            <td>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-info dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        {{ ucfirst(trans('common.actions')) }}

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($item->deleted_at)
                                                        @if(@$recycle)
                                                        <a class="dropdown-item btn-restore" href="#"
                                                            data-action="restore"
                                                            data-url="{{ asset('admin/products/restore/'.@$item->id)}}"
                                                            data-title-msg="{{ ucfirst(trans('common.restore_sucursal')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.restore')) }}">
                                                            <i class="fas fa-trash-restore"></i>
                                                            {{ ucfirst(trans('common.restore')) }}
                                                        </a>
                                                        @endif
                                                        @else
                                                        @if(@$edit)
                                                        <a href="{{ url('admin/products/' . @$item->id . '/edit') }}"
                                                            class="dropdown-item">
                                                            <i class="fas fa-edit"></i>
                                                            {{ ucfirst(trans('common.update')) }}
                                                        </a>
                                                        @endif
                                                        @if (@$detail)
                                                        <a href="{{ url('admin/products/' . @$item->id . '/detail') }}"
                                                            class="dropdown-item">
                                                            <i class="fas fa-info ml-2"></i>
                                                            {{ ucfirst(trans('common.detail')) }}
                                                        </a>
                                                        @endif
                                                        @if(@$gallery)
                                                        <a href="{{ url('admin/products/' . @$item->id . '/images') }}"
                                                            class="dropdown-item" title='{{ ucfirst(trans('common.image_gallery')) }}'>
                                                            <i class="fas fa-images"></i>
                                                            {{ ucfirst(trans('common.image_gallery')) }}
                                                        </a>
                                                        @endif
                                                        @if(@$recycle)
                                                        <a class="dropdown-item" href="#" data-action="recycle"
                                                            data-name="{{ $item->productName }}" data-url='{{ asset('
                                                            admin/products/soft/'.@$item->id) }}'
                                                            data-title-msg="{{
                                                            ucfirst(trans('common.msgdelete_register')) }}"
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.recycle')) }}">
                                                            <i class="fas fa-trash"></i>
                                                            {{ ucfirst(trans('common.recycle')) }}
                                                        </a>
                                                        @endif
                                                        @if(@$trash)
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#" data-action="delete"
                                                            data-name="{{ $item->productName }}"
                                                            data-url="{{ route('products.destroy', $item->id) }}"
                                                            data-title-msg="{{ ucfirst(trans('common.msgdelete_register')) }}"
                                                            data-text-msg="{{ ucfirst(trans('common.msgdelete')) }}"
                                                            data-btn-action="{{ ucwords(trans('common.delete')) }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                            {{ ucfirst(trans('common.delete')) }}
                                                        </a>
                                                        @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @include('admin.products.partials.modal-delete')
                                @include('admin.products.partials.modal-recycle')
                                @include('admin.products.partials.modal-restore')
                                <div class="float-left">
                                    {{ $text_pagination }}
                                </div>
                                <div class="float-right">
                                    <div class="btn-group">
                                        {!! $products->appends(request()->except('page'))->render() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
    </div>

</section>
@endsection