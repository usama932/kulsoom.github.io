@extends('layouts.master')
@section('page_title', 'Manage Drivers')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Drivers</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item dropdown"><a href="#all-publisher" class="nav-link dropdown-toggle active" data-toggle="tab">Manage Drivers</a></li>
            <li class="nav-item"><a href="#new-user" class="nav-link" data-toggle="tab">Create New Driver</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('drivers.store') }}" data-fouc>
                    @csrf
                    <h6>Driver Info</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="drivername" placeholder="Driver Name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="email" placeholder="Driver Email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Conact: <span class="text-danger"></span></label>
                                    <input value="" required type="text" name="phone" placeholder="Phone" class="form-control">
                                </div>
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
                            <th>Driver Name</th>
                            <th>Driver Email</th>
                            <th>Driver Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($drivers as $drive)
<tr>
        <td>{{ $drive['id'] }}</td>
        <td>{{ $drive['drivername'] }}</td>
        <td>{{ $drive['email'] }}</td>
        <td>{{ $drive['phone'] }}</td>
       
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $drive->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $drive->id }}" action="{{ route('driver.destroy' , $drive->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $drive->id }}" type="text" hidden></form>
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

{{--Driver List Ends--}}

@endsection
