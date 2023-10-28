@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
          
            <div class="card-header">
                <h3 class="text-center">Fallacy Edit</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('fallacy.update') }}" id="fallacyForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $fallacy->id }}">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="Fallacy">Fallacy <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="Fallacy" value="{{ $fallacy->fallacy }}" name="fallacy" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="Code">Code <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="Code" value="{{ $fallacy->code }}" name="code" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="email">Description <span class="required">*</span>
                        </label>
                        <div>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $fallacy->description }}</textarea>
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
            