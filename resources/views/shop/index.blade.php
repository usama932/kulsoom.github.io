@extends('layouts.master')
@section('page_title', 'Products')
@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Shop</h6>
        {!! Qs::getPanelOptions() !!}
    </div>
    <div class="card-body">


        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#allPro" class="nav-link active" data-toggle="tab">Books</a></li>
            <li class="nav-item"><a href="#createpro" class="nav-link " data-toggle="tab">Add Book</a></li>

        </ul>


<div class="tab-content">
            <div class="tab-pane fade show active" id="allPro">
                <table class="table datatable-button-html5-columns table-responsive">
<tble>
<thead>
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Pages</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($shops as $pro)
<tr>
        <td>{{ $pro['id'] }}</td>
        <td>{{ $pro['name'] }}</td>
        <td>{{ $pro['price'] }}</td>
        <td>{{ $pro['category'] }}</td>
        <td>{{ $pro['pages'] }}</td>
        <td>{{ $pro['description'] }}</td>
        <td>{{ $pro['quantity'] }}</td>
        <td>
            <img src="{{ asset('uploads/shop/'.$pro['image']) }}" width="70px" height="100px">
        </td>

        <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            {{--Delete--}}
                                            <a id="{{ $pro->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            <form method="post" id="item-delete-{{ $pro->id }}" action="{{ route('shop.destroy' , $pro->id) }}" class="hidden">@csrf @method('delete') <input name="id" value="{{ $pro->id }}" type="text" hidden></form>
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

<div class="tab-pane fade " id="createpro">
<form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-store" action="{{ route('shop.store') }}" >
                    @csrf
                    <h6></h6>
                    <fieldset>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="name" placeholder="Book Name" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price: <span class="text-danger">*</span></label>
                                    <input value="" required type="text" name="price" placeholder="Book price" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pages: <span class="text-danger">*</span></label>
                                    <input value="" required type="number" name="pages" placeholder="Pages Count" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Details: </label>
                                    <input value=""  type="text" name="description" placeholder="Book Details" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Quantity: </label>
                                    <input value=""  type="number" name="quantity" placeholder="Quantity" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="inputState">Category</label>
                                <select class="form-control" id="inputState" name="category">
                                    <option selected>Choose...</option>
                                    <option value="Science">Science</option>
                                    <option value="Arts">Arts</option>
                                    <option value="IT">IT</option>
                                    <option value="Medical">Medical</option>
                                    <option value="Poetry">Poetry</option>
                                    <option value="Commerce">Commerce</option>


                                    
                                </select>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image: <span class="text-danger">*</span></label>
                                    <input value="" required type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    
                                    <input value="Submit" type="submit" name="addPro" class="form-control btn btn-primary">
                                </div>
                            </div>
                        </div> -->
                        
                    </fieldset>
                    

                </form>

              

</div>
</div>
</div>

   
@endsection
