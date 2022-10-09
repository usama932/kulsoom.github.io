@extends('layouts.master')
@section('page_title', 'Manage Books')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Books</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#new-user" class="nav-link active" data-toggle="tab">Create New Books</a></li>
            <li class="nav-item dropdown"><a href="#all-books" class="nav-link dropdown-toggle" data-toggle="tab">Manage Books</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('book.store') }}" data-fouc>
                    @csrf
                    <h6>Book Info</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input value="{{ old('name') }}" required type="text" name="name" placeholder="Book Name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category"> Select Category: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="category_id" id="category">
                                        <option disabled selected value="">Select Category</option>
                                    @foreach($categories as $cat) 
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="author"> Select Author: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="auther_id" id="author">
                                    <option disabled selected value="">Select Auther</option>
                                    @foreach($authors as $aut) 
                                         <option value="{{ $aut->id }}">{{ $aut->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="publisher"> Select Publisher: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="publisher_id" id="Publisher">
                                    <option disabled selected value="">Select Publisher</option>
                                    @foreach($publishers as $pub) 
                                         <option value="{{ $pub->id }}">{{ $pub->name }}</option>
                                    @endforeach 
                                    </select>
                                </div>
                            </div>
                         </div>
                        
                    </fieldset>


                </form>
            </div>

        
            <div class="tab-pane fade" id="all-books">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ App\Models\auther::where('id',$book->auther_id)->first()['name'] }}</td>
                            <td>{{ App\Models\publisher::where('id',$book->publisher_id)->first()['name'] }}</td>
                            <td>{{ App\Models\category::where('id',$book->category_id)->first()['name'] }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">

                                            {{--Edit--}}
                                            <a href="{{ route('book.edit', $book->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                            {{--Delete--}}
                                            <a id="{{ $book->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $book->id }}" action="{{ route('book.destroy', $book->id ) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $book->id }}" type="text" hidden></form>
                                    
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

{{--Student List Ends--}}

@endsection
