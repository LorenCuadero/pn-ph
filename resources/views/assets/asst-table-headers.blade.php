<div class="card-header d-flex flex-wrap align-items-center justify-content-between">
    <p class="card-title mb-3 mb-md-0" style="color:#1f3c88; padding-left:0%; font-size: 22px"><b>Academic Reports</b>
    </p>
    <div class="d-flex flex-wrap align-items-center ml-auto">
        <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0" style="display: flex; align-items: center;">
            <div style="display: flex; align-items: center; height: 38px;">
                {{-- <input class="form-control mr-sm-1 searchInput" type="search" placeholder="Search record here"
                    aria-label="Search" style="height: 100%; width: 200px;"> --}}
            </div>
            <div class="nav-item dropdown show btn btn-sm batch-year-dropdown"
                style="display: flex; align-items:center; height: 38px;">
                <a class="nav-link dropdown-toggle align-items-center" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="true"
                    style="color:#fff;height: 100%; display: flex; align-items: center;">
                    {{ $selectedBatchYear ?? 'Year' }}
                </a>
                <div class="dropdown-menu mt-0" style="left: 0px; right: inherit;">
                    @foreach ($students->pluck('batch_year')->unique() as $year)
                        <a class="dropdown-item" href="#" data-widget="iframe-close">{{ $year }}</a>
                    @endforeach
                </div>
            </div>
            <div class="nav-item dropdown show btn btn-sm sort-by-user-id"
                style="display: flex; align-items:center; height: 38px; margin-left: 4px;">
                <a class="nav-link dropdown-toggle align-items-center" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="true"
                    style="color:#fff;height: 100%; display: flex; align-items: center;">Order
                    By</a>
                <div class="dropdown-menu mt-0" style="left: 0px; right: inherit;">
                    <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Ascending
                        Order</a>
                    <a class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Descending
                        Order</a>
                </div>
            </div>
            <div class="nav-item dropdown show btn btn-sm reset-filter-btn"
                style="display: flex; align-items:center; height: 38px; margin-left: 4px;">
                <a class="nav-link align-items-center"
                    style="color:#fff;height: 100%; display: flex; align-items: center;">Reset Year
                    Filter</a>
            </div>
        </form>
    </div>
</div>
