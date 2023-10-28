@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="x_content">
            <br />
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <form method="post" action="{{ route('permission.update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="first-name" value="{{$post->name}}"name="name" required="required" class="form-control ">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" class="btn btn-success float-right">update</button>
                        <button type="button" class="btn btn-danger float-right" onclick="history.back()">Cancel</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>  
@endsection