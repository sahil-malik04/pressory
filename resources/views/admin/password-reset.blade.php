@extends('layouts.admin')
@section('content')
<style>
     label.error {
         color: red;
         font-size: 14px;
    }
</style>
<div class="right_col" role="main">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Change Password</h3>
            </div>
            <div class="card-body col-lg-6 mx-auto">
               
                <form action="{{route('password.change')}}" method="post" id="change-Form">
                    @csrf
                    <div class="form-group">
                        <label for="new" class="form-label"> Old Password *</label>
                        <div class="d-flex">
                            <input type="password" class="form-control" name="current_password" id="current_password">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new" class="form-label"> New Password *</label>
                        <div class="d-flex">
                            <input type="password" class="form-control" name="new_password" id="new_password">
                            <div class="input-group-append  rounded-0">
                                <span class="input-group-text  rounded-0" onclick="newPassword();">
                                <i class="fa fa-eye" id="show_eye"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="form-label"> Confirm Password *</label>
                        <div class="d-flex">
                            <input type="password" class="  form-control" name="confirm_password" id="confirm_password">
                            <div class="input-group-append  rounded-0">
                                <span class="input-group-text  rounded-0" onclick="confirmPassword();">
                                <i class="fa fa-eye" id="show_eyes"></i>
                                <i class="fa fa-eye-slash d-none" id="hide_eyes"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-success float-right" type="submit" >Save</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
function newPassword() {
    var x = document.getElementById("new_password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}

function confirmPassword() {
    var x = document.getElementById("confirm_password");
  var show_eye = document.getElementById("show_eyes");
  var hide_eye = document.getElementById("hide_eyes");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
@endsection 