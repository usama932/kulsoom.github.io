@extends('layouts.master')
@section('page_title', 'Admission Applications')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Applications</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="" class="nav-link active" data-toggle="tab">Admission Applications</a></li>
        </ul>


<div class="tab-content">
            <div class="tab-pane fade show active" id="">
                <table class="table datatable-button-html5-columns table-responsive">
<tble>
<thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Class</th>
                            <th>Mother Name</th>
                            <th>Father Name</th>
                            <th>Previous School</th>
                            <th>Left Year</th>
                            <th>Additional Info</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
@foreach($admissions as $adm)
<tr>
        <td>{{ $adm['id'] }}</td>
        <td>{{ $adm['stname'] }}</td>
        <td>{{ $adm['email'] }}</td>
        <td>{{ $adm['phone'] }}</td>
        <td>{{ $adm['class'] }}</td>
        <td>{{ $adm['mother'] }}</td>
        <td>{{ $adm['father'] }}</td>
        <td>{{ $adm['previoussch'] }}</td>
        <td>{{ $adm['leftyear'] }}</td>
        <td>{{ $adm['info'] }}</td>

        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $adm->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $adm->id }}" action="{{ route('admission.destroy' , $adm->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $adm->id }}" type="text" hidden></form>
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
@endsection
