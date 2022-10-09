@include('layouts.header')
<style>
.history{
    color:#111;
    font-family: arial;
}
    </style>
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">My Orders</h1>
</section>
<!-- end inner-banner -->
<div class="mt-5 pl-5 pr-5">
@foreach($orders as $items)

<div class="row mb-5 pl-4 pr-4 history">
 <div classs="col-md-4 col-4 col-sm-4">
 <img src="{{ asset('uploads/shop/'.$items->image) }}" height="130px" width="100px">
</div>
<div class="col-md-1 col-sm-1 col-1"></div>
<div classs="col-md-6 col-6 col-sm-6">
    <h5><b>Book name: {{ $items->name }}</b></h5>
    <p><b>Description:</b> {{ $items->description }} </p>
    <p><b>Price:</b> $ {{ $items->price }} </p>
    <p><b>Category:</b> {{ $items->category }} </p>


</div>
</div>
@endforeach
</div>




<!-- @if(Session::has('loginname'))
@php 
echo Session('loginname');
@endphp
@endif -->
                       


@include('layouts.footer')
