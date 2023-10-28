@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="x_content">
            <br />
          
            <form method="post" action="{{ route('fallacy.add') }}">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="Fallacy">Fallacy <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="Fallacy"  name="fallacy" required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="Code">Code <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="Code"  name="code" required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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