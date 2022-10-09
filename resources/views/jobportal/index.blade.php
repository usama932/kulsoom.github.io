
@extends('layouts.master')
@section('page_title', 'Jobs')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Job Portal</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">


        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#alljob" class="nav-link active" data-toggle="tab">Job Posts</a></li>
            <li class="nav-item"><a href="#createjob" class="nav-link " data-toggle="tab">Post New Job</a></li>

        </ul>


<div class="tab-content">
            <div class="tab-pane fade show active" id="alljob">
                <table class="table datatable-button-html5-columns">
<tble>
<thead>
                        <tr>
                            <th>ID</th>
                            <th>Job Name</th>
                            <th>Details</th>
                            <th>Salary</th>
                            <th>Job Type</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
<tr>
        <td>{{ $job['id'] }}</td>
        <td>{{ $job['jobname'] }}</td>
        <td>{{ $job['details'] }}</td>
        <td> Rs. {{ $job['salary'] }}</td>
        <td>{{ $job['jobtype'] }}</td>
        <td>{{ $job['position'] }}</td>
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $job->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $job->id }}" action="{{ route('jobs.destroy' , $job->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $job->id }}" type="text" hidden></form>
                                        </div>
                                    </div>
                                </div>
                            </td>
      





</tr>
@endforeach
</tbody>
</table>
</div>

<!-- add -->

<div class="tab-pane fade " id="createjob">
<form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('jobs.store') }}" data-fouc>
                    @csrf
                    <h6>Job Posts</h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Job Name: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="jobname" placeholder="Job Name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Details: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="details" placeholder="Job Details" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Salary: <span class="text-danger">*</span></label>
                                    <input value="" required type="number" name="salary" placeholder="Salary" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Job Type: <span class="text-danger">*</span></label>
                                    <select class="form-control" required id="" name="jobtype">
                                        <option disabled selected value="">Select Job type</option>
                                        <option value="Fulltime">Full Time</option>
                                        <option value="Parttime">Part Time</option>

                                    </select>
                                </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Position: <span class="text-danger">*</span></label>
                                    <select class="form-control" required id="inputState" name="position">
                                        <option disabled selected value="">Select Position</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Assistant">Assistant</option>


                                    </select>
                                </div>
                            </div>
                         </div>

                      
                    </fieldset>
                </form>

                        

                    
                    

              

</div>
</div>
</div>

   
@endsection



