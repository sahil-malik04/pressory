@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        @if($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
        @endif
        <a href="javascript:void(0)" class="btn btn-primary sidebar-action-open">Add Gallery</a>
          <div id="myGrid" class="ag-theme-alpine" style="height:auto"></div>

    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <script>
         
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
@section('sidebar-title')
  Add Gallery
 @endsection

@section('sidebar')
        <form method="post" action="{{ route('gallery.add') }}" enctype="multipart/form-data" id="galleryForm" class="px-4">
            @csrf
            <div class="form-group">
                <label class="col-form-label label-align" for="faq_question">Title <span class="required">*</span>
                </label>
                <div>
                    <input type="text" name="img_name" id="img_name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label label-align" for="faq_question">Image <span class="required">*</span>
                </label>
                <div>
                    <input type="file" name="img[]" id="img[]" class="form-control" multiple>
                </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
                <div>
                    <button type="submit" class="btn btn-success float-right">Save</button>
                </div>
            </div>
        </form>
@endsection

@endsection