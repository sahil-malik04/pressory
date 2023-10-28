<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Register</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/toaster.css') }}" rel="stylesheet">
  </head>
  <style>
     label.error {
         color: red;
         font-size: 14px;
    }
  </style>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <h6 class="display-4 text-center" style="color:rgb(14 165 233/1)">
                 <span class="text-white pr-2 pl-1 ml-1 " style="background-color:rgb(14 165 233/1)">Pressory</span>

             </h6>           
               
            
            <form method="post" action="{{ route('login.user') }}" id="loginForm">
            @csrf
              
              <div>
                <input type="text" class="form-control" placeholder="Email"  id="email" name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password"  />
              </div>
              <div>
                <button class="btn btn-primary submit" name="submit">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <p>© <?= date('Y'); ?> FifthEstate.com, LLC. All rights reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="{{ route('reg.create') }}">
              @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="name" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <select name="role" class="form-control" required>
                  <option Selected> Select Role</option>
                  @foreach($roles as $data)
                  <option value="{{ $data->id }}">{{ $data->role }}</option>
                  @endforeach
                </select>
              </div>
              <br>
              <div>
                <button class="btn btn-info submit" name="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <!-- <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div> -->
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="{{ asset('assets/vendors/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/toaster/toaster.js') }}"></script>
    <script src="{{ asset('assets/js/validation/validation.js') }}"></script>
    <script src="{{ asset('assets/js/validation/validate.js') }}"></script>
    <script>
      $(document).ready(function(){
        $('.close').click(function(){
            $('.alert').hide();
        });
      });
    </script>

<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif
  
  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif
  </script>


<script>

   $(document).ready(function(){

        @foreach($errors->all() as $error)
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ $error }}");
        @endforeach
        
      })
    </script>


  </body>
</html>
