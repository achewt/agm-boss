<section class="section">
    <div class="section-header">
        @isset($goBack)
        <div class="section-header-back">
            <a href="{{ $goBack }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        @endisset
        <h1>@yield('body_title', 'Dashboard')</h1>
        @isset($addLink)
        <div class="section-header-button">
            <a href="{{ $addLink }}" class="btn btn-primary">Add New</a>
        </div>
        @endisset
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
            @isset($bcSecond)
            <div class="breadcrumb-item">
                @if(isset($bcSecondLink))
                    <a href="{{ $bcSecondLink ?? '#' }}">{{ $bcSecond ?? '' }}</a>
                @else
                    {{ $bcSecond ?? '' }}
                @endif
            </div>
            @endisset
            @isset($bcSecondLink)
                <div class="breadcrumb-item">@yield('body_title')</div>
            @endisset
        </div>
    </div>

    <div class="section-body">
        {{ $slot }}
    </div>
</section>