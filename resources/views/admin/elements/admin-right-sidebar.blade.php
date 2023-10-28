 <!-- Add Sidebar -->
 <div class="sidebar-container d-none justify-content-end">
        <div class="col-lg-3 col-md-8 col-sm-12 float-right bg-white p-0 ml-auto h-100 overflow-auto">
            <div class="card card-default shadow-none">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title font-weight-bold" data-sidebar-title="">@yield('sidebar-title')</h3>
                    <div  class="sidebar-block sidebar-action-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </div>
                </div>

                @yield('sidebar')
              
            </div>
        </div>
    </div>