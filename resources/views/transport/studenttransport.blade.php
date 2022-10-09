@extends('layouts.master')
@section('page_title', 'Manage Transports')
@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Transports</h6>
        {!! Qs::getPanelOptions() !!}
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item dropdown"><a href="#all-publisher" class="nav-link dropdown-toggle active" data-toggle="tab">Manage Transport</a></li>
            <li class="nav-item"><a href="#new-user" class="nav-link" data-toggle="tab">Add Student Transport</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade" id="new-user">
                <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('transport.store') }}" data-fouc>
                    @csrf
                    <h6>Student Transport Info</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student"> Student: <span class="text-danger">*</span></label>
                                    <select required class="form-control select-search" name="student" id="student">
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
                                    <label>Drive Name: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="driver" id="driver">
                                        <option disabled selected value="">Select Driver</option>
                                    @foreach($drivers as $drive) 
                                        <option value="{{ $drive->drivername }}">{{ $drive->drivername }}</option>
                                    @endforeach 
                                    </select>                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Van: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="van" id="van">

                                    <option disabled selected value="">Select Van</option>
                                    @foreach($vans as $v) 
                                        <option value="{{ $v->vanname }}">{{ $v->vanname }}</option>
                                    @endforeach 
                                    </select>                           
                                         </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pickup Shift: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="pickupshift" id="pickupshift">

                                    <option disabled selected value="">Select Shift</option>
                                    <option value="1st Shift 7:20 AM">1st Shift - 7:20 AM</option>
                                    <option value="2nd Shift 7:45 AM">2nd Shift - 7:45 AM</option>

                                    </select>                           
                                         </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Drop Shift: <span class="text-danger">*</span></label>
                                    <select required class="form-control select" name="dropshift" id="dropshift">

                                    <option disabled selected value="">Select Shift</option>
                                    <option value="1st Shift 1:50 PM">1st Shift - 1:50 PM</option>
                                    <option value="2nd Shift 2:15 PM">2nd Shift - 2:15 PM</option>

                                    </select>                           
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
                            <th>Student </th>
                            <th>Driver</th>
                            <th>Van</th>
                            <th>Pickup Shift</th>
                            <th>Drop Shift</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transports as $trans)
<tr>
        <td>{{ $trans['id'] }}</td>
        <td>{{ $trans['student'] }}</td>
        <td>{{ $trans['driver'] }}</td>
        <td>{{ $trans['van'] }}</td>
        <td>{{ $trans['pickupshift'] }}</td>
        <td>{{ $trans['dropshift'] }}</td>

       
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $trans->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $trans->id }}" action="{{ route('transport.destroy' , $trans->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $trans->id }}" type="text" hidden></form>
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

{{--transport List Ends--}}

@endsection
