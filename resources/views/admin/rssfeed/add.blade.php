@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="x_content">
            <br />
          
            <form method="post" action="{{ route('rssfeed.add') }}">
                @csrf
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="feed_address">RSS Feed Address<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <input type="text" id="feed_address"  name="feed_address" required="required" class="form-control ">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="publication_id">Publication RSS Feed from<span class="required">*</span>
                    </label>
                    <div class="col-md-8 col-sm-6 ">
                        <select name="publication_id" id="" class="form-control">
                            <option Selected>Select Publication</option>
                            @foreach($publication as $data)
                            <option value="{{ $data->id }}">{{ $data->publication }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description <span class="required">*</span>
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
                
               
                