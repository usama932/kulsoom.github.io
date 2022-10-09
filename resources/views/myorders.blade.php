@include('layouts.header')
<style>
.history{
    color:#111;
    font-family: arial;
}
.mail{

    background-color:#0c0b39;
    color:white;
    box-shadow:1px 2px 3px 2px #ff9600;
}
.mail:hover{
    background-color:#ff9600;
    color:#0c0b39;
    box-shadow:1px 2px 3px 2px #0c0b39;
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

 <div class="col-md-3 col-3 col-sm-4">

 <img src="{{ asset('uploads/shop/'.$items->image) }}" height="150px" width="120px">
</div>


<div class="col-md-4 col-4 col-sm-6" align="left">
    <h5><b>Book name: {{ $items->name }}</b></h5>
    <p><b>Description:</b> {{ $items->description }} </p>
    <p><b>Price:</b> $ {{ $items->price }} </p>
    <p><b>Category:</b> {{ $items->category }} </p>


</div>

@endforeach

<div class="col-md-5 col-5 col-sm-12" align="right">
<br><br><br><br><br>
<form action="{{ route('send') }}" method="POST">
    @csrf

<input name="email" type="hidden" value="{{ $items->email }}">
<button type="submit" class="mail btn px-4 py-2">Get Confirmationm Mail</button>
</form>
</div>
</div>
</div>
</div>
<!-- @if(Session::has('loginname'))
@php 
echo Session('loginname');
@endphp
@endif -->
                       


@include('layouts.footer')
