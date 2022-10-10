@extends('layouts.master')
@section('page_title', 'Manage Quiz')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Quiz</h6>
        
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Quiz</a></li>
            <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Quiz</a></li>
        </ul>

        <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Question</th>
                            <th>Options</th>
                            <th>Correct</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizs as $quiz)
                            <tr>
                                <td>{{ $quiz->id }}</td>
                                <td>{{ $quiz->question }}</td>
                                <td><b>Option A :</b> {{ $quiz->option_a }}<br>
                                    <b>Option B :</b> </>{{ $quiz->option_b }}<br>
                                    <b>Option C :</b> {{ $quiz->option_c }}<br>
                                    <b>Option D :</b> {{ $quiz->option_d }}</td><br>
                                <td>{{ $quiz->correct }}</td>
                                <td>{{ $quiz->user_id }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-left">
                                              
                                                {{--Edit--}}
                                                <a href="{{ route('quizzes.edit',$quiz->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                
                                                   
                                                        {{--Delete--}}
                                                      
                                                        <form method="post"  action="{{ route('quizzes.destroy',$quiz->id) }}" class="hidden">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"  class="dropdown-item"><i class="icon-trash"></i> Delete</button></ a>
                                                        </form>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                          
                       
                        </tbody>
                    </table>
                </div>

            <div class="tab-pane fade" id="new-class">
                <div class="row">
                    <div class="col-md-12">
                        <form  method="post" action="{{ route('quizzes.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Question <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="question" value="{{ old('question') }}" required type="text" class="form-control" placeholder="Enter Question">
                                </div>
                            </div>
                            <div class="form-group row d-flex">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Option A <span class="text-danger">*</span></label>
                                <div class="col-lg-3">
                                    <input name="option_a" value="{{ old('option_a') }}" required type="text" class="form-control" placeholder="Option A">
                                </div>
                                <label class="col-lg-3 col-form-label font-weight-semibold">Option B <span class="text-danger">*</span></label>
                                <div class="col-lg-3">
                                    <input name="option_b" value="{{ old('option_b') }}" required type="text" class="form-control" placeholder="Option B">
                                </div>
                                <label class="col-lg-3 col-form-label font-weight-semibold">Option C <span class="text-danger">*</span></label>
                                <div class="col-lg-3 mt-2">
                                    <input name="option_c" value="{{ old('option_c') }}" required type="text" class="form-control" placeholder="Option C">
                                </div>
                                <label class="col-lg-3 col-form-label font-weight-semibold">Option D <span class="text-danger">*</span></label>
                                <div class="col-lg-3 mt-2">
                                    <input name="option_d" value="{{ old('option_d') }}" required type="text" class="form-control" placeholder="Option D">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Correct <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="correct" value="{{ old('correct') }}" required type="text" class="form-control" placeholder="Enter Correct Answer">
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
    </div>
</div>

@endsection