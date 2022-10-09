@extends('layouts.master')
@section('page_title', 'Orders')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">All Orders</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">


        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all" class="nav-link active" data-toggle="tab">Orders</a></li>

        </ul>


<div class="tab-content">
            <div class="tab-pane fade show active" id="all">
                <table class="table datatable-button-html5-columns table-responsive">
<tble>
<thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>User Id</th>
                            <th>Product Id</th>
                            <th>Total Amount (All Products)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $ord)
<tr>
        <td>{{ $ord['id'] }}</td>
        <td>{{ $ord['name'] }}</td>
        <td>{{ $ord['address'] }}</td>
        <td>{{ $ord['userid'] }}</td>
        <td>{{ $ord['productid'] }}</td>
        <td>$ {{ $ord['total'] }}</td>
       
        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $ord->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $ord->id }}" action="{{ route('order.destroy' , $ord->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $ord->id }}" type="text" hidden></form>
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


</div>
</div>

   
@endsection
