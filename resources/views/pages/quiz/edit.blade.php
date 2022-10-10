@extends('layouts.master')
@section('page_title', 'Manage Quiz')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Edit Question</h6>
        
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form  method="post" action="{{ route('quizzes.update',$quiz->id) }}">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Question <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="question" value="{{ $quiz->question }}" required type="text" class="form-control" placeholder="Enter Question">
                        </div>
                    </div>
                    <div class="form-group row d-flex">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Option A <span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <input name="option_a" value="{{ $quiz->option_a }}" required type="text" class="form-control" placeholder="Option A">
                        </div>
                        <label class="col-lg-3 col-form-label font-weight-semibold">Option B <span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <input name="option_b" value="{{ $quiz->option_b }}" required type="text" class="form-control" placeholder="Option B">
                        </div>
                        <label class="col-lg-3 col-form-label font-weight-semibold">Option C <span class="text-danger">*</span></label>
                        <div class="col-lg-3 mt-2">
                            <input name="option_c" value="{{ $quiz->option_c }}" required type="text" class="form-control" placeholder="Option C">
                        </div>
                        <label class="col-lg-3 col-form-label font-weight-semibold">Option D <span class="text-danger">*</span></label>
                        <div class="col-lg-3 mt-2">
                            <input name="option_d" value="{{ $quiz->option_d }}" required type="text" class="form-control" placeholder="Option D">
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Correct <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            <input name="correct" value="{{ $quiz->correct }}" required type="text" class="form-control" placeholder="Enter Correct Answer">
                        </div>
                    </div>
                        
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
</div>

@endsection