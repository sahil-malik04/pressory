@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
           
           <div class="card-header">
               <h3 class="text-center">Publication Edit</h3>
           </div>
           <div class="card-body">
               <form method="post" action="{{ route('publication.update') }}" enctype="multipart/form-data" id="publicationForm">
                   @csrf
                   <input type="hidden" name="id" value="{{ $publication->id }}">
               
                   <div class="form-group">
                       <label class="col-form-label label-align" for="Publication">Publication <span class="required">*</span>
                       </label>
                       <div>
                           <input type="text" id="Publication" value="{{ $publication->publication }}"  name="publication" required="required" class="form-control ">
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-form-label label-align" for="domain">Domain <span class="required">*</span>
                       </label>
                       <div>
                       <textarea name="domain" id="" cols="20" rows="5" class="form-control">{{ $publication->domain }}</textarea>
                       </div>
                       
                   </div>
                   <div class="form-group">
                       <label class="col-form-label label-align" for="country">Country <span class="required">*</span>
                       </label>
                       <select name="country" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($country as $val)
                            <option value="{{ $val->id }}" @if($publication->country == $val->id) {{ 'SELECTED' }} @endif>{{ $val->country_name }}</option>
                            @endforeach
                        </select>
                       <!-- <div>
                           <input type="text" id="country" value="{{ $publication->country }}"  name="country" required="required" class="form-control ">
                       </div> -->
                   </div>
                   <div class="form-group">
                        <label class="col-form-label  label-align" for="website">Website<span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="website"  name="website"  class="form-control ">{{ $publication->website }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label  label-align" for="twitter">Twitter <span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="twitter"  name="twitter"  class="form-control ">{{ $publication->twitter }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label  label-align" for="wiki_pedia">Wikipedia <span class="required">*</span>
                        </label>
                        <div>
                            <textarea type="text" id="wiki_pedia"  name="wiki_pedia"  class="form-control ">{{ $publication->wiki_pedia }}</textarea>
                        </div>
                    </div>

                   <div class=" form-group">
                        <label class="col-form-label label-align" for="country">Change Publication Image <span class="required">*</span>
                        </label>
                        <div class="row">
                            <div class="col-md-2">

                                <input type="file" id="image"  name="image"  onchange="showPreview(event);" value="{{ $publication->image }}">
                            </div>
                        <div class="col-md-12">
                            <div class="row mt-3">
                                <div class="col-md-2 mr-2">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <img src="{{ asset('storage/publication') }}/{{$publication->image}}" alt="" class="img-rectangle img-fluid" style="width:100%">
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
               