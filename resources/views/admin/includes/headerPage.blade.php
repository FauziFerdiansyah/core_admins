@if( View::hasSection('title_page') && View::hasSection('breadcrumb') )
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">
                        @if(View::hasSection('title_page'))
                            @yield('title_page')
                        @else
                            Data
                        @endif
                    </h5>
                    @if(View::hasSection('sub_title_page'))
                        <p class="m-b-0"> @yield('sub_title_page') </p>
                    @else
                        <div style="height: 19px"></div>
                    @endif
                </div>
            </div>
            @if(View::hasSection('breadcrumb'))
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        @yield('breadcrumb')
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endif