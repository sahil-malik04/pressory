@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
          
            <div class="card-header">
                <h3 class="text-center">User Profile</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('update.admin') }}" enctype="multipart/form-data" id="profile">
                    @csrf
                    <input type="hidden" name="ids" value="{{ $profile->id }}">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="first-name" value="{{$profile->first_name}}" name="first_name" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="Last-name">Last Name <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="Last-name" value="{{$profile->last_name}}" name="last_name" required="required" class="form-control ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label label-align" for="email">Email <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="email" value="{{ $profile->email }}" name="email" required="required" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group" id="image">
                        <label class="col-form-label label-align" for="image">User Profile
                        </label>
                        <div>
                            <input type="file" id="image" name="profile_image"  class="form-control" onchange="showPreview(event);">
                            <img id="prev" alt="" class="img-circle" width="100">
                        </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success float-right">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("prev");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
@endsection
