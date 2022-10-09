@extends('layouts.master')
@section('page_title', 'Contact Messages')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Messages</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="" class="nav-link active" data-toggle="tab">Contact Messages</a></li>
        </ul>


<div class="tab-content">
            <div class="tab-pane fade show active" id="">
                <table class="table datatable-button-html5-columns">
<tble>
<thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
@foreach($contacts as $con)
<tr>
        <td>{{ $con['id'] }}</td>
        <td>{{ $con['name'] }}</td>
        <td>{{ $con['email'] }}</td>
        <td>{{ $con['phone'] }}</td>
        <td>{{ $con['message'] }}</td>
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $con->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $con->id }}" action="{{ route('contact.destroy' , $con->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $con->id }}" type="text" hidden></form>
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
