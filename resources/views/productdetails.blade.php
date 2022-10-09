@include('layouts.header')


<style>
   .profile .imgtext{
        text-align: center;
        height:59px;
        padding-top:11px;
        background-color:#222;
        color: #aa9166;
        font-size:21px;
        font-weight:500;
        text-transform:capitalize
   }
   .profile h1{
       font-size:55px;
       text-transform:capitalize;
       font-family: 'EB Garamond', serif;
       color:#121518;
       font-weight:bold
       

   }
   .profile .about{
       font-size:21px;
       font-weight:500;
       font-family: 'Roboto', sans-serif;


   }
   .profile hr{
       color:#aa9166;
       border-color:#aa9166;
       background-color:#aa9166;
       height:2px;
       width:vw;  
   }
   .profile p{
       font-size:18px;
       font-family: 'Roboto', sans-serif;
       font-weight:400

   }
   .profile h3{
    font-family: 'Roboto', sans-serif;
    font-weight:600
   }
   .profile .btn{
       background-color:#121518;
       color:#aa9166;
       box-shadow:#aa9166 1px 2px 1px 2px;
       height:50px;
       font-size:18px;
       font-weight:500;
       font-family: 'Roboto', sans-serif;
       padding-left:21px;
       padding-right:21px;
   }
   .profile .btn:hover{
       background-color:#aa9166;
       color:#121518;
       box-shadow:#121518 1px 2px 1px 2px;
       height:50px;
       font-size:18px;
       font-weight:500;
       font-family: 'Roboto', sans-serif;
       padding-left:21px;
       padding-right:21px;
   }
   .profile img{
       object-fit:cover;
   }
   .profile .con p{
      
    text-transform:capitalize;
   }
       
    @media screen and (max-width:850px)
    {
        .profile h1{
            font-size:43px;
        }
        .profile p{
            font-size:16px;
        }
        .profile h3{
            font-size:25px;
        }

    }
    @media screen and (max-width:980px)
    {
        .profile img{
            height:320px;
        }
    }

    @media screen and (max-width:769px)
    {
        .profile img{
            height:420px;
        }
    }
    @media screen and (min-width:1336px)
    {
        .profile img{
            height:460px;
        }
    }
</style>



<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Product Detail</h1>
</section>
<!-- end inner-banner -->
<div class="pl-5 pr-4 mt-5 mb-5">
<div class="row profile">
@php 

@endphp
  
         <div class="col-md-5 col-lg-5 col-12 pr-4">
             <img src="" width="100%" height="410px">
             <br>
             <div class="imgtext"></div>
         </div>

         <div class="col-md-5 col-lg-5 col-12 pl-4">
             <h1></h1>
             <p class="about mt-3"></p>
             <hr class="mb-4">
             <p><b>Description:</b>
             <br> </p>
             <p>Total Cases: &nbsp; </p>
             
             <div class="row mt-4">
                 <div class="col-md-8 col-lg-8 con">
                   <h3>CONTACT DETAILS:</h3>
                   <P class="mt-3"><b>Phone:</b> <br> &nbsp;</p>
                  <p><b>Location: </b> <br> &nbsp; </p>
                  
                 </div>
           
                 <div class="col-md-4 col-lg-4"><br><br>
                     <a href="meeting_form.php"><input type="submit" value="Schedule Meeting" class="btn "></a>
                 </div>
             </div>

            <br>
         </div>
     </div>
</div>
     @include('layouts.footer')
