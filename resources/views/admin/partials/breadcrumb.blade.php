<h2 class="pageheader-title">{{$title}}</h2>
<div class="page-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/admin/dashboard') }}" class="breadcrumb-link">
                    {{ ucfirst(trans('common.home')) }}
                </a>
            </li>
            @foreach ($breadcrumbs['text'] as $key=>$item)
                
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumbs['url'][$key]}}" class="breadcrumb-link">
                        {{ $item }}
                    </a>
                </li>    
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">
                {{ $final }}
            </li>
        </ol>
    </nav>
</div>    