@include('layouts.header')
<style>
.checkout .check{
background-color:#121211;
color:#eee
}
.checkout h5{
    color:#999
}

</style>
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">My Cart</h1>
</section>
<!-- end inner-banner -->
@php 
$totalname="";
@endphp

@php 
$useraddress="";
@endphp

@php 
$userphone="";
@endphp

@php 
$useremail="";
@endphp
@php 
$total=0;
@endphp
<div class="container-fluid">
<div class="row mt-5 pl-5 pr-5 mb-5">
<div class="col-md-8 col-sm-9 col-12 shopping" ><br>
<h2 class="heading" style="font-style:bold; font-family:arial"> <b>Shopping Cart</b></h1>
<br>
@forelse($shops as $cart)


<div class="row">
<div class="col-lg-2 col-md-2 col-sm-6 col-6 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<img src="{{ asset('uploads/shop/'.$cart->image) }}" height="110px" width="80px">

</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<h4> <b>{{ $cart->name }} </b></h4>
<p> {{ $cart->description }}</p>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-6 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<br><br><h6>{{ $cart->category }}</h6>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-6 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<br><br><h6>x {{ $cart->qty }}</h6>
</div>

<div class="col-lg-2 col-md-2 col-sm-6 col-6 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<br><br>
<h6> <b>$ {{ $cart->price * $cart->qty }} </b></h6>
</div>

<div class="col-lg-1 col-md-1 col-sm-1 col-1 mb-4 pb-3" style="border-bottom:1px solid #ddd">
<br><br><a href="/removecart/{{ $cart->cartid }}"><h6><b> X </b></h6></a>
</div>

@php 

 $total+=$cart->price * $cart->qty

 @endphp

 @php 
$useremail = $cart->email;
@endphp

 @php 
$totalname = $cart->uname;
@endphp

@php 
$useraddress = $cart->uaddress;
@endphp

@php 
$userphone = $cart->uphone;
@endphp


</div>

@empty
<p align="center" style="color:#333; font-size:18px" class="text-center" >Cart is empty!</p>

@endforelse
<div class="row" style="border-bottom:1px solid #ddd">

<div align="left" class="col mt-2">
<a href="shop"><p><b> < Continue to shopping </b> </p></a>
</div>

<div align="right" class="col">
<h5><span style="color:#999">Total: </span> <b>$ {{ $total}}</b> </h5>
</div>

</div>
</div>
<div class="col-md-4 col-sm-4 col-12 checkout pl-5 pr-5" align="center"><br>
<h2 class="heading" style="font-style:bold; font-family:arial"> <b>Checkout</b></h1>
<br>
    <div class="check pt-2 " align="left">
        <div class="pl-4 pr-4 pt-4">
    <h5>Personal Details</h5>
    <form action="{{ route('order') }}" method="POST">
    @csrf

    
   
    Name: {{$totalname}} <br>
    Address: {{ $useraddress }}<br>
    Phone: {{ $userphone }}<br>
    Email: {{ $useremail }}



    <br>
    <hr style="background-color:#666; border-color:#666">
<br>

    <h5>Payment Method</h5>
    <div class="form-group">
           <input name="payment" vale="cod" required type="radio"> COD (CashOnDelivery)
    </div>
   
    <hr style="background-color:#666; border-color:#666">

    <h6>Total Amount</h6>
    <h6> <b> $ {{ $total}} <b></h6>
    <br>
</div>



@forelse($shops as $cart)


<input name="total" type="hidden" value="{{ $total }}">
<input name="name" type="hidden" value="{{ $cart->uname }}">
<input name="phone" type="hidden" value="{{ $cart->uphone }}">
<input name="address" type="hidden" value="{{ $cart->uaddress }}">


@empty
@endforelse


   <div class="pt-2 pb-2" style="background-color:#777; font-style:bold; color:white; border:none">                     
<button class="form-control" style="background-color:#777; font-style:bold; color:white; border:none"  href="">Order Now</button>
</div>
</form>
</form>

</div>
</div>
</div>

</div>

@include('layouts.footer')
