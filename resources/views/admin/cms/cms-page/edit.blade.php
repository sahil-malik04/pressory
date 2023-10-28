@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
 
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Page Content Edit</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('update.page') }}" id="pageForm" class="px-4">
                    @csrf
                    <input type="hidden" name="id" value="{{$page->id}}">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="title">Title <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="title" id="title" class="form-control" value="{{$page->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="content">Meta Content <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="meta_content" id="meta_content" class="form-control" value="{{$page->meta_content}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="description">Meta Description <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{$page->meta_description}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="Keyword">Meta Keyword <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{$page->meta_keyword}}">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-form-label label-align" for="url">Page Url <span class="required">*</span>
                        </label>
                        <div>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{$page->slug}}">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-form-label label-align" for="content">Page Content <span class="required">*</span>
                        </label>
                        <div>
                        <textarea name="page_body" id="page_body" cols="30" rows="5" class="form-control">{{$page->page_body}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="status" >Status<span class="required">*</span>
                        </label>
                        <div>
                            <div class="">
                                <label>
                                    <input type="checkbox" class="js-switch" name="is_activated" @if($page->is_activated == 1) {{'CHECKED'}} @endif/>
                                </label>
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