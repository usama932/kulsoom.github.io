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
            <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Take Quiz</a></li>
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
                        <a href="{{ route('taketest') }}">
                        <button type="button" class="btn btn-success">Take Test</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection