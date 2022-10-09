<html>
   <head>
     <style>
.bodyy{
    background-image: url('thanks.jpg');
    background-size:cover;
    size:cover;
    height:100vh;
    width:100%;
    background-repeat:no-repeat;
    color:#eee;
    align-items:center;
     justify-content:center;
     display:flex;
    


}
    </style>
    </head>
    <body>
<div class="bodyy" style="">
<div align="center" style="display:flex; align-items:center; justify-content:center;">
<h1>Thankyou @if(Session::has('loginid'))<b> {{ Session::get('loginname') }}</b> @endif For Shopping! For order details go to <br><br>
<b> <a href="{{ route('myorder') }}" style="color:#e38b00">Order history </a> </b></h1>
</div>
</div>
</body>
</html>