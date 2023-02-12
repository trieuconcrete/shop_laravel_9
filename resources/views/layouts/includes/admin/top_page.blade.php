<div class="d-flex justify-content-between flex-wrap mb-4">
    <div class="d-flex align-items-end flex-wrap">
        <div class="d-flex">
            <i class="mdi {{ $icon }} hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;{{ $title }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-end flex-wrap">
        @foreach ($functions as $button)
        <a href="{{ $button['route'] }}">
            <button type="button" class="btn btn-outline-primary btn-icon @if (!$loop->last) me-3 @endif mt-2 mt-xl-0">
                <i class="mdi {{ $button['icon'] }}"></i>
            </button>
        </a>
        @endforeach
        {{-- <a href="{{ $functions[0] }}">
            <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
                <i class="mdi mdi-plus text-muted"></i>
            </button>
        </a>
        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
        </button>
        <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-download text-muted"></i>
        </button>
        <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button> --}}
    </div>
</div>