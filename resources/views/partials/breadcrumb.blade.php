<div class="hstack flex-wrap gap-3 mb-4">
    <div class="flex-grow-1">
        <h4 class="mb-1 fw-semibold">@yield('sub-title')</h4>
        <nav>
            <ol class="breadcrumb breadcrumb-arrow mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('index') }}">@yield('pagetitle')</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">@yield('sub-title')</li>
            </ol>
        </nav>
    </div>

  </div>
