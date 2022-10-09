@extends('layouts.master')
@section('page_title', 'Manage Author')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Manage Author</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item dropdown"><a href="#all-authors" class="nav-link dropdown-toggle active" data-toggle="tab">Manage Author</a></li>
            <li class="nav-item"><a href="#new-user" class="nav-link" data-toggle="tab">Create New Author</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('authors.store') }}" data-fouc>
                    @csrf
                    <h6>Author Info</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input value="{{ old('name') }}" required type="text" name="name" placeholder="Author Name" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                    </fieldset>


                </form>
            </div>

        
            <div class="tab-pane fade show active" id="all-authors">
                <table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $author->name }}</td>
                           
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">

                                            {{--Edit--}}
                                            <a href="{{ route('authors.edit', $author->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                            {{--Delete--}}
                                            <a id="{{ $author->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $author->id }}" action="{{ route('authors.destroy', $author->id ) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $author->id }}" type="text" hidden></form>
                                    
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
