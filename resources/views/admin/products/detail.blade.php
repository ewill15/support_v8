@extends('layouts.admin.app')
@section('title', ucfirst(trans('common.detail')).'-'.ucfirst(trans('common.product')))
@section('content')

  <!-- ============================================================== -->
  <!-- pageheader -->
  <!-- ============================================================== -->
  <section class="content-header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="page-header">
                      <h2 class="pageheader-title">{{ ucfirst(trans('common.detail_product')) }}</h2>
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
                                    {{ ucfirst(trans('common.detail_product')) }}
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
  <!-- Main content -->
  <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->productName}}</h3>
              <div class="col-12 full-image">                
                @if (count($product->images))
                  <img src="{{url('img/gallery_images/'.$product->images[0]->image)}}" class="product-image" alt="{{$product->productName}}">
                @else
                  <img src="{{url('img/no-image.png')}}" class="product-image" alt="{{$product->productName}}">
                @endif

              </div>
              <div class="col-12 product-image-thumbs">
                @foreach ($product->images as $iproduct)
                  <div class="product-image-thumb {{($loop->first)?'no-overlay-product-detail':'overlay-product-detail'}}">
                    <img src="{{$iproduct->show_picture}}" alt="{{$product->productName}}">
                  </div>                  
                @endforeach
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->productName}}</h3>
              <p>{{$product->description}}</p>
              <hr>
              <h4 class="mt-3">
                {{ucfirst(trans('common.product_control_serie'))}}
                <span style="font-weight:300">{{$product->serial_control?'SI':'NO'}}</span>
              </h4>

              @if ($product->size_list)
                <h4 class="mt-3">
                  {{ucfirst(trans('common.product_size'))}}
                </h4>
                <div class="btn-group btn-group-toggle detail-product-size" data-toggle="buttons">
                  @foreach ($product->size_list as $list_size)
                    <label class="btn btn-default text-center">
                      {{$list_size}}
                    </label>    
                  @endforeach                
                </div>
              @endif              
              

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  $80.00
                </h2>
                <h4 class="mt-0">
                  <small>Ex Tax: $80.00 </small>
                </h4>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">
                  {{ucfirst(trans('common.more_info'))}}
                </a>
              </div>
            </nav>
            <div class="tab-content p-3 w-100" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">
                  {{-- left --}}
                  <div class="col-md-6">  
                    <div class="row mt-3 pl-2">
                      <label class="font-weight-bold">
                        {{ucfirst(trans('common.state'))}}                
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->state->name_state}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3 pl-2">
                      <label class="font-weight-bold">
                        {{ucfirst(trans('common.category'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->category->name_category}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3 pl-2">
                      <label class="font-weight-bold">
                        {{ucfirst(trans('common.subcategory'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->subcategory->name_subcategory}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3 pl-2">
                      <label class="font-weight-bold">
                          {{ucfirst(trans('common.origin'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->origin->name_origin}}
                        </label>                        
                      </div>
                    </div>
                  </div>
                  
                  {{-- right --}}
                  <div class="col-md-6"> 
                    <div class="row mt-3">
                      <label class="font-weight-bold">
                        {{ucfirst(trans('common.user_creator'))}}                
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->user->name_lastname}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3">
                      <label class="font-weight-bold">
                          {{ucfirst(trans('common.brand'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->brand->name_brand}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3">
                      <label class="font-weight-bold">
                          {{ucfirst(trans('common.prototype'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->prototype->name_prototype}}
                        </label>                        
                      </div>
                    </div>
                    <div class="row mt-3">
                      <label class="font-weight-bold">
                          {{ucfirst(trans('common.type'))}}
                      </label>
                      <div class="col-md-8">
                        <label class="font-weight-300">
                          {{$product->type->name_type}}
                        </label>                        
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
