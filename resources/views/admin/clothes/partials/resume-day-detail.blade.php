<div class="tab-pane fade active show" id="custom-all" role="tabpanel" aria-labelledby="custom-all-tab">                                                            
    <div class="row mb-3">                                
        <div class="col">
            <button id="btn-detail" class="btn btn-outline-primary disabled">
                {{ ucfirst(trans('common.sales_detail')) }}
            </button>
        
            <button id="btn-resume" class="btn btn-outline-secondary">
                {{ ucfirst(trans('common.sales_resume')) }}
            </button>
        </div>
    </div>
    
    <div id="daily">
        <div class="table-responsive">                                
            <table class="table table-register table-striped table-bordered table-hover">                                        
                <thead>
                    <tr>
                        <th>{{ ucfirst(trans('common.date_sale')) }}</th>
                        <th>{{ ucfirst(trans('common.type')) }}</th>
                        <th>{{ ucfirst(trans('common.description')) }}</th>
                        <th>{{ ucfirst(trans('common.transaction_type')) }}</th>
                        <th>{{ ucfirst(trans('common.quantity')) }}</th>
                        <th>{{ ucfirst(trans('common.price')) }}</th>
                        @if (auth()->user()->role == 'admin')
                            <th class="actions">{{ ucfirst(trans('common.actions')) }}</th>
                        @endif
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($clothes as $item)
                        <tr class="gradeX {{ $item->type == 1 ? '' : 'text-danger' }}">
                            <td class="w-150p">{{ @$item->dateSaleFormat }}</td>
                            <td>{{ @$item->income }}</td>
                            <td>{{ @$item->description }}</td>
                            <td>{{ @$item->paymentText }}</td>
                            <td>{{ @$item->quantity }}</td>
                            <td>{{ @$item->price }}</td>
                            @if (auth()->user()->role == 'admin')
                                <td>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        {{ ucfirst(trans('common.actions')) }}
                                    </button>
                                    <div class="dropdown-menu">
                                            <a href="{{ url('admin/clothes/' . @$item->id . '/edit') }}" class="dropdown-item">
                                                <i class="fas fa-edit"></i> {{ ucfirst(trans('common.update')) }}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"
                                                data-action="delete"
                                                data-name="{{ $item->description }}" 
                                                data-url="{{ route('clothes.destroy', $item->id) }}" 
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
                            @endif                                                
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin.clothes.partials.modal-delete')
            <div class="float-left">
                {{ $text_pagination }}
            </div>
            <div class="float-right">                                        
                <div class="btn-group">
                {!! $clothes->appends(request()->except('page'))->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>