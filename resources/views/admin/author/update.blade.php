@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
            
            <div class="card-header">
                <h3 class="text-center">Author Edit</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('author.update') }}" enctype="multipart/form-data" id="authorForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $author->id }}">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label label-align" for="author">Author Name <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="author" value="{{ $author->author_name }}"  name="author_name" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="nationality">Nationality <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="nationality" value="{{ $author->nationality }}"  name="nationality" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label  label-align" for="website">Website<span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="website"  name="website"  class="form-control ">{{ $author->website }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label  label-align" for="twitter">Twitter <span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="twitter"  name="twitter"  class="form-control ">{{ $author->twitter }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label  label-align" for="wiki_pedia">Wikipedia <span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="wiki_pedia"  name="wiki_pedia"  class="form-control ">{{ $author->wiki_pedia }}</textarea>
                        </div>
                    </div>

                    <div class=" form-group">
                        <label class="col-form-label label-align" for="country">Change author Image <span class="required">*</span>
                        </label>
                        <div class=" ">
                            <input type="file" id="image"  name="image" onchange="showPreview(event);">
                            <div class="row mt-3">
                                <div class="col-md-2 mr-2">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <img src="{{ asset('storage/author') }}/{{$author->image}}" alt="" class="img-rectangle img-fluid" style="width:100%">
                                        </div>
                                        <div class="card-body text-center border-top p-0">
                                            <span class="col-form-label font-weight-bold label-align">Previous Image</span>
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="col-md-2 mr-2">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <img id="prev"  alt="Preview image"  src="{{ asset('images/dummy.png') }}" class="img-rectangle" class="img-rectangle img-fluid" style="width:100%">
                                        </div>
                                        <div class="card-body text-center border-top p-0">
                                            <span class="col-form-label font-weight-bold label-align">New Image</span>
                                        </div>
                                    </div>
                                </div> 
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