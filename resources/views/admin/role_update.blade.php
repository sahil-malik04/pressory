@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
      
        
        <div class="x_content">
            <br />
           
            <form method="post" action="{{ route('role.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name Role <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="first-name" value="{{$post->role}}"name="role" required="required" class="form-control " disabled>
                    </div>
                </div>
                <div class="row">
                    @foreach($permission as $value)
                    <div class="col-md-2">
                        <label for="permission">{{$value->name}}</label>
                        <input type="checkbox" class="form-check-box" name="permission_id[]" value="{{ $value->id }}">
                    </div>
                    @endforeach
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>  
@endsection