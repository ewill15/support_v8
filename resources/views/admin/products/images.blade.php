@extends('layouts.admin.app')
@section('title', 'Estado')
@section('content')
<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">{{ ucfirst(trans('common.gallery_product')) }}</h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                    {{ ucfirst(trans('common.home')) }}
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ url('/admin/products') }}" class="breadcrumb-link">
                    {{ ucfirst(trans('common.list_products')) }}
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{ ucfirst(trans('common.gallery_images')) }}
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- ============================================================== -->
<!-- end pageheader -->
<!-- ============================================================== -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @include('admin.partials.messages')
        @include('admin.partials.errors', ['errors' => $errors])
        <div class="card">
          <h5 class="card-header">{{ ucfirst(trans('common.insert_image_product')) }}</h5>
          <div class="card-body">
            {!! Form::model($product, [
            'id'=>'storage_image',
            'url' => 'admin/product/store_image',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
            'class' => 'form-horizontal']) !!}
            @include('admin.products.partials.form_images', ['errors' => $errors])
            @include('admin.partials.buttons', ['label' => ucfirst(trans('common.create'))])
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="product-gallery" class="content">
  <div class="container-fluid">
    <div class="row mt-4">
      @foreach ($product_images as $item)
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <div class="position-relative mb-4">
              <img src="{{ @$item->show_picture }}" alt="image" class="img-fluid">
              <div class="ribbon-wrapper ribbon-lg">
                @if ($item->state_id == 1)
                <div class="ribbon bg-success text-lg">
                  {{ ucfirst(trans('common.visible')) }}
                </div>
                @else
                <div class="ribbon bg-danger text-lg">
                  {{ ucfirst(trans('common.hidden')) }}
                </div>
                @endif
              </div>
            </div>

            <div class="d-flex flex-row justify-content-end">
              @if (@$gallery_state)
              <a href="#" class="btn btn-primary mr-3"
              data-action="edit_gallery"
              data-title-msg="{{ucfirst(trans('common.image_status'))}}"
              data-url="{{asset('admin/product/edit_state_image')}}"
              data-state-id="{{$item->state_id}}"
              data-image-id="{{@$item->id}}"
              data-state-visible="{{ucfirst(trans('common.visible'))}}"
              data-state-hidden="{{ucfirst(trans('common.hidden'))}}"
              data-btn-action="{{ ucwords(trans('common.confirm')) }}">
                <i class="far fa-file-alt"></i>
                {{ ucfirst(trans('common.visible')) }}
              </a>
              @endif
              @if (@$gallery_delete)
              <a href="#" class="btn btn-danger mr-3" 
                data-action="delete_gallery"
                data-url="{{ asset('admin/product/delete_image') }}"
                data-title-msg="{{ucfirst(trans('common.delete_image'))}}"
                data-text-msg="{{ucfirst(trans('common.deletes.image'))}}" 
                data-image-id="{{@$item->id}}"
                data-btn-action="{{ ucwords(trans('common.delete')) }}">
                <i class="far fa-trash-alt"></i>
                {{ ucwords(trans('common.delete')) }}
              </a>
              @endif
            </div>

          </div>
        </div>
      </div>
      @include('admin.products.partials.modal-editG')      
      @endforeach
      
      @include('admin.products.partials.modal-deleteG')
    </div>
  </div>
</section>
@endsection