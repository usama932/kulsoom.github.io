@extends('layouts.master')
@section('page_title', 'Manage Students')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Students</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item dropdown"><a href="#all-publisher" class="nav-link dropdown-toggle active" data-toggle="tab">Manage Student</a></li>
            <li class="nav-item"><a href="#new-user" class="nav-link" data-toggle="tab">Add Student Class</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('studentclass.store') }}" data-fouc>
                    @csrf
                    <h6>Student Class Info</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student">Student Name: <span class="text-danger">*</span></label>
                                    <select required class="form-control select-search" name="student">
                                    <option disabled selected value="">Select Student</option>
                                    @foreach($students as $stu) 
                                        <option value="{{ $stu->name }}">{{ $stu->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>

                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class: <span class="text-danger">*</span></label>
                                    <select required class="form-control select-search" name="class">
                                        <option disabled selected value="">Class</option>
                                        @foreach($my_classes as $class) 
                                        <option value="{{ $class->name }}">{{ $class->name }}</option>
                                    @endforeach
                                   
                                    </select>                                </div>
                            </div>
                        </div>

                        


                    
                      
                    </fieldset>
                </form>
            </div>
        
            <div class="tab-pane fade show active" id="all-publisher">
            @if(isset($error))
            <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info border-0 alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <span>{{ $error }}</span>
                            </div>
                        </div>
                </div>
            @endif

                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student </th>
                            <th>Class</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($student_classes as $stuclass)
<tr>
        <td>{{ $stuclass['id'] }}</td>
        <td>{{ $stuclass['student'] }}</td>
        <td>{{ $stuclass['class'] }}</td>
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $stuclass->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $stuclass->id }}" action="{{ route('studentclass.destroy' , $stuclass->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $stuclass->id }}" type="text" hidden></form>
                                        </div>
                                    </div>
                                </div>
                            </td>
</tr>   
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{--studentclasses List Ends--}}

@endsection
