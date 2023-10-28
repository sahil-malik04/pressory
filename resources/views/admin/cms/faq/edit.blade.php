@extends('layouts.admin')
@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
        <div class="card">
           
            <div class="card-header">
                <h3 class="text-center">Edit FAQ</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('faq.update') }}" id="faqForm">
                    @csrf
                    <input type="hidden" name="id" value="{{ $faq->id }}">
                    <div class="form-group">
                        <label class="col-form-label label-align" for="faq_question">Faq Ques <span class="required">*</span>
                        </label>
                        <div>
                            <textarea id="fquestion"  name="fquestion"  class="form-control">{{ $faq->fquestion }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="fanswer">Faq Ans <span class="required">*</span>
                        </label>
                        <div>
                            <textarea  id="fanswer"  name="fanswer"  class="form-control" cols="30" rows="10">{{ $faq->fanswer }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label label-align" for="fanswer">Status<span class="required">*</span>
                        </label>
                        <div>
                            <div>
                                <label>
                                    <input type="checkbox" class="js-switch" name="status" @if($faq->status) {{'CHECKED'}}@endif/>
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