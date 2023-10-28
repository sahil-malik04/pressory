@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
          
            <div class="card-header">
                <h3 class="text-center">Ip Edit</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('blockedip.update') }}" id="ipForm">
                    @csrf
                    <input type="hidden" id="ip" value="{{ $blockedip->id }}" name="id" required="required" class="form-control ">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="ip">Ip <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" id="ip" value="{{ $blockedip->ip }}" name="ip" required="required" class="form-control ">
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