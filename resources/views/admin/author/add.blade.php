@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="x_content">
            <br />
            @if(Session::has('message'))
                <div class="alert alert-primary">{{session('message')}}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">{!! implode('', $errors->all('<div>:message</div>')) !!}</div>
            @endif
            <form method="post" action="{{ route('author.add') }}" id="authorForm">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="author">Author </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="author"  name="author_name"  class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nationality">Nationality </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="nationality"  name="nationality"  class="form-control ">
                    </div>
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
                
               
                