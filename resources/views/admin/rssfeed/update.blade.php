@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
         
            <div class="card-header">
                <h3 class="text-center">Edit Rss Feed</h3>
            </div>
            <div class="card-body">            
                <form method="post" action="{{ route('rssfeed.update') }}" id="rssfeedForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $rss->id }}">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="feed_address">RSS Feed Address<span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="feed_address" value="{{ $rss->feed_address }}"  name="feed_address" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="publication_id">Publication RSS Feed from<span class="required">*</span>
                        </label>
                        <div>
                            <select name="publication_id" id="" class="form-control">
                                <option value="">Select Publication</option>
                                @foreach($publication as $data)
                                
                                <option value="{{ $data->id }}"@if($rss->publication_id == $data->id){{"SELECTED"}}@endif>{{ $data->publication }}</option>
                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="description">Description <span class="required">*</span>
                        </label>
                        <div>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $rss->description }}</textarea>
                        </div>
                        
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success float-right">Update</button>
                            <button type="button" class="btn btn-danger float-right" onclick="history.back()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection