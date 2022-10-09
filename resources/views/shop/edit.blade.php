@extends('layouts.master')
@section('page_title', 'Edit Book')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Book</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('book.update',$book->id) }}">
                        @csrf
                        <input name="id" value="{{ $book->id }}" type="text" hidden>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="name" value="{{ $book->name }}" required type="text" class="form-control" placeholder="Name of Book">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold" for="category"> Select Category: <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                            <select required class="form-control select" name="category_id" id="category">
                                        <option disabled selected value="">Select Category</option>
                                @foreach($categories as $cat) 
                                    @if($cat->id == $book->category_id)
                                        <option selected value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @else
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endif
                                @endforeach 
                            </select>
                            </div>
                        </div>
                           

                            <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="author"> Select Author: <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <select required class="form-control select" name="author_id" id="author">
                                    <option disabled selected value="">Select Auther</option>
                                    @foreach($authors as $aut) 
                                        @if($aut->id == $book->auther_id)
                                            <option selected value="{{ $aut->id }}">{{ $aut->name }}</option>
                                        @else
                                            <option value="{{ $aut->id }}">{{ $aut->name }}</option>
                                        @endif
                                    @endforeach 
                                    </select>
                                    </div>
                                </div>
                            
                            <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold" for="publisher"> Select Publisher: <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                    <select required class="form-control select" name="publisher_id" id="Publisher">
                                    <option disabled value="">Select Publisher</option>
                                    @foreach($publishers as $pub)
                                        @if($pub->id == $book->publisher_id)
                                            <option selected value="{{ $pub->id }}">{{ $pub->name }}</option>
                                        @else
                                            <option value="{{ $pub->id }}">{{ $pub->name }}</option>
                                        @endif
                                    @endforeach 
                                    </select>
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

    {{--Class Edit Ends--}}

@endsection
