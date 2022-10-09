@extends('layouts.master')
@section('page_title', 'Manage Issued Books')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Issued Books</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-books" class="nav-link active" data-toggle="tab">Manage Issued Books</a></li>
            @if(Auth::user()->user_type != 'student')
            <li class="nav-item"><a href="#new-user" class="nav-link" data-toggle="tab">Create New Issued Books</a></li>
           @endif
        </ul>
        @if(Auth::user()->user_type != 'student')
        <div class="tab-content">
            <div class="tab-pane fade" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('book_issue.store') }}" data-fouc>
                    @csrf
                    <h6>Issue Book</h6>
                    <fieldset>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category"> Select Student: <span class="text-danger">*</span></label>
                                    <select required class="form-control select-search" name="student_id" id="category">
                                        <option disabled selected value="">Select Student</option>
                                    @foreach($students as $stu) 
                                        <option value="{{ $stu->id }}">{{ $stu->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="author"> Select Book: <span class="text-danger">*</span></label>
                                    <select required class="form-control select-search" name="book_id" id="author">
                                    <option disabled selected value="">Select Book</option>
                                    @foreach($books as $book) 
                                         <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>
                    </fieldset>

                </form>
            </div>
            @endif
        
            <div class="tab-pane fade show active" id="all-books">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Student</th>
                            <th>Book</th>
                            <th>Status</th>
                            <th>Return Date</th>
                            @if(Auth::user()->user_type != 'student')
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($books_issued as $book)
                        <tr>
                        @if(Auth::user()->user_type == 'student')
                            @if($book->student_id == Auth::user()->id)
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ App\User::where('user_type','student')->where('id',$book->student_id)->first()['name'] }}</td>
                            <td>{{ App\Models\book::where('id',$book->book_id)->first()['name'] }}</td>
                            <td class="{{ $book->issue_status == 'Y' ? 'text-success' : 'text-danger' }}">{{ $book->issue_status == 'Y' ? 'Returned' : 'Unreturned' }}</td>
                            <td>{{ $book->return_date?date('d-M-Y', strtotime($book->return_date)):'' }}</td>
                           
                            @endif
                            

                        @else
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ App\User::where('user_type','student')->where('id',$book->student_id)->first()['name'] }}</td>
                            <td>{{ App\Models\book::where('id',$book->book_id)->first()['name'] }}</td>
                            <td class="{{ $book->issue_status == 'Y' ? 'text-success' : 'text-danger' }}">{{ $book->issue_status == 'Y' ? 'Returned' : 'Unreturned' }}</td>
                            <td>{{ $book->return_date?date('d-M-Y', strtotime($book->return_date)):'' }}</td>
                        @endif
                        @if(Auth::user()->user_type != 'student')
                        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Edit--}}
                                            @if($book->issue_status == 'N')
                                            <a href="{{ route('book_issue.edit', Qs::hash($book->id) ) }}" class="dropdown-item"><i class="icon-pencil"></i> Return</a>
                                            @endif
                                            {{--Delete--}}
                                            <a id="{{ $book->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $book->id }}" action="{{ route('book_issue.destroy', Qs::hash($book->id) ) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $book->id }}" type="text" hidden></form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--Student List Ends--}}
@endsection
