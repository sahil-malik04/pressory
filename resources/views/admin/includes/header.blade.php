<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/ico" />

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/canvas.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/toaster.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
    
    <style>
      .required{
        color:red;
      }
    </style>

  </head>
  <style>
     
</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin/dashboard" class="site_title text-center text-white" >
                Pressory
               {{-- <img src="{{ asset('assets/images/logo.png') }}"  class="text-center" style="width:80px"> --}}
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              @if(Auth::guard('user')->user()->profile_image)  
                  <img src="/storage/user/{{ Auth::guard('user')->user()->profile_image }}" alt="" class="img-circle profile_img">
                  @else
                  <img src="{{ asset('/images/default_user_image.png') }}" alt="" class="img-circle profile_img">
              @endif
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="{{route('dashboard.admin')}}"><i class="fa fa-home"></i> Home</a> </li>

                  <li><a><i class="fa fa-globe"></i> CMS <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('faq.list') }}">FAQ</a></li>
                      <li><a href="{{ route('list.page') }}">Page</a></li>
                      <!-- <li><a href="{{ route('menu.list') }}">Manage Menu</a></li> -->
                      <!-- <li><a href="{{ route('gallery.list') }}">Gallery</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Manage Author <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('author.index') }}">All Author</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-user"></i> Manage Article <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('article_list') }}">All Article</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-globe"></i> Article Fallacy <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('fallacy.views') }}">All Article Fallacy</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-globe"></i> Manage Publication <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('publication.index') }}">All Publication</a></li>
                    </ul>
                  </li>
                  
                  <li><a><i class="fa fa-globe"></i> Manage Fallacy <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('fallacy.index') }}">All Fallacy</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-globe"></i> RSS Feeds <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('rssfeed.index') }}">All Rss Feeds</a></li>
                      <!-- <li><a href=" ">Rss Feed Logs</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-globe"></i> Blocked Ip <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('blockedip.index') }}">All Blocked</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-user"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('user.list') }}">All Users</a></li>
                    </ul>
                  </li>

                  
                  <!-- @if(Auth::guard('user')->user()->can('forAdmin','App\Models\User'))
                   <li><a><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Setting <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('role.view') }}">Roles</a></li>
                      <li><a href="{{ route('permission.table') }}">Permission</a></li>
                    </ul>
                  </li>
                  @endif -->

                  
                 <!-- <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li>  -->
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a> -->
              <!-- <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout.user') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  @if(Auth::guard('user')->user()->profile_image)  
                  <img src="/storage/user/{{ Auth::guard('user')->user()->profile_image }}" alt="">
                  @else
                  <img src="{{ asset('/images/default_user_image.png') }}" alt="" >

                  @endif
                  {{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="/admin/profile/{{ Auth::guard('user')->user()->id}}"> Profile</a>
                    <a class="dropdown-item"  href="{{route('dashboard.reset')}}">Change Password</a>
                     
                  <!-- <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item"  href="{{ route('logout.user') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->