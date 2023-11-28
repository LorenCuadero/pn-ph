<div class="card-header d-flex flex-wrap align-items-center justify-content-between">
    <div class="d-flex flex-wrap align-items-center ml-auto">
        <form class="form-inline mr-auto mr-md-0 mb-2 mb-md-0" style="display: flex; align-items: center;">
            <div style="display: flex; align-items: center; height: 38px;">
                <input class="form-control mr-sm-1 searchInput1" type="search" placeholder="Search record here"
                    aria-label="Search" style="height: 100%; width: 200px;">
            </div>
            <div class="nav-item dropdown show btn btn-sm batch-year-dropdown1"
                style="display: flex; align-items:center; height: 38px;">
                <a class="nav-link1 dropdown-toggle align-items-center" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="true"
                    style="color:#fff;height: 100%; display: flex; align-items: center;">
                    {{ $selectedBatchYear ?? 'Year' }}
                </a>
                <div class="dropdown-menu mt-0 dropdown-menu-column" style="left: 0px; right: inherit; text-align:center;">
                    @foreach ($students->pluck('batch_year')->unique() as $year)
                        <a class="dropdown-item1" href="#" data-widget="iframe-close">{{ $year }}</a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </div>
            <div class="nav-item dropdown show btn btn-sm reset-filter-btn1"
                style="display: flex; align-items:center; height: 38px; margin-left: 4px;">
                <a class="nav-link1 align-items-center"
                    style="color:#fff;height: 100%; display: flex; align-items: center;">Reset Year
                    Filter</a>
            </div>
        </form>
    </div>
</div>
