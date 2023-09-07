@if ($action=='simple')
    <h2 class="pageheader-title">{{$title}}</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin/dashboard') }}" class="breadcrumb-link">
                        {{ ucfirst(trans('common.home')) }}
                    </a>
                </li>
                @if (isset($breadcrumb))
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb_url }}" class="breadcrumb-link">
                            {{ $breadcrumb_text }}
                        </a>
                    </li>
                @endif
                <li class="breadcrumb-item active">
                    {{ $item_breadcrumb }}
                </li>
            </ol>
        </nav>
    </div>    
@else    
    <h2 class="pageheader-title">{{$title}}</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                        {{ ucfirst(trans('common.home')) }}
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb_url }}" class="breadcrumb-link">
                        {{ $breadcrumb_text }}
                    </a>
                </li>
                @if (isset($breadcrumb_2))
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb_2_url }}" class="breadcrumb-link">
                            {{ $breadcrumb_2_text }}
                        </a>
                    </li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $item_breadcrumb }}
                </li>
            </ol>
        </nav>
    </div>    
@endif