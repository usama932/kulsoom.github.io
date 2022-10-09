@include('layouts.header')

<style>
@charset "utf-8";
/* CSS Document */
*{
	font-family: 'Karla', sans-serif;
}
.filter{
	border:1px solid #CCC;
}
.accordion {
 background-color:white;
  font-weight:600;
  font-size:21px;
  cursor: pointer;
  padding: 8px;
  padding-bottom:15px;
  width: 100%;
   border: none;
  text-align: left;
  outline: none;
  border-radius:none;
  transition: 0.4s;
  border-bottom:1px solid rgba(0,0,0,0.1);
  padding-top:15px;
  color:black
  
}
.filter p{
	color:black;
	cursor:pointer;
	
}
.filter p span{
	font-size:18px;
}
.filter span{
	line-height:32px;
}
.filter p span:hover{
	font-weight:600;
}
.filter button:focus{
	outline:none;
	box-shadow:none;
}
.accordion:after {
  content: "\2304";
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
 
 
  
}

.filter .active:after {
  content: "\2303";
}

.panel2 {
  padding: 0 18px;
 max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  border:none;
  backrgound-color:white;
 
  
}

.filter .container-fluid {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 20px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color:black
}
.filter .container-fluid input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.container-fluid .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #999;
}

.container-fluid .checkmark:hover {
	background-color:#BD8A53;
}

.container-fluid :hover input ~ .checkmark {
  background-color: #CCC;
}
.container-fluid .checkmark:after {
  content: "";
  position: absolute;
  display: none;
  
}
.container-fluid input:checked ~ .checkmark {
	background-color:black;
	border-color:black;
}

.container-fluid input:checked ~ .checkmark:after {
  display: block;
}

.container-fluid .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/*discount*/
.filter .fluid {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  color:black
}
.filter .fluid input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.fluid .checkmark2 {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #999;
  border-radius:100%;
}

.fluid .checkmark2:hover {
	background-color:#BD8A53;
}

.fluid :hover input ~ .checkmark2 {
  background-color: #CCC;
}
.fluid .checkmark2:after {
  content: "";
  position: absolute;
  display: none;
  
}
.fluid input:checked ~ .checkmark2 {
	background-color:black;
	border-color:black;
}

.fluid input:checked ~ .checkmark2:after {
  display: block;
}

.fluid .checkmark2:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.filter .reset{
	background-color:black;
	color:white;
	border-color:black;
	border-radius:0;
	font-size:16px;
	padding:9px;
	padding-left:13px;
	padding-right:13px;
}
.filter .reset:hover{
	background-color:#BD8A53;
	border-color:#BD8A53;
	transition:0.5s;
	color:white;
}
.sort {
	font-size:17px;
}
.sort select{
	outline:none;
	box-shadow:none;
	border:1px solid #CCC;
}
	
.breadhome a{
	color:black;
	text-decoration:none;
	font-size:17px;
	font-weight:600
	
}.breadhome a:hover{
	color:#333;
	text-decoration:none;
	border-bottom:1.5px solid #BD8A53
	
}
.breadproduct .p {
	color:#999;
	font-size:17px; 
}
.box{
	margin:0;
	box-sizing:border-box;
	text-decoration:none;
	transition:all .2s linear;
	font-family:karla;
	overflow-x:hidden
}
.box{
	display:flex;
	align-items:center;
	justify-content:center;
	flex-wrap:wrap
}
.cards{
	height:vh;
	/*height:400px;
	width:250px;*/
	overflow:hidden;
	margin:8px 0
	
}
.cards:hover{
	box-shadow:2px 3px 4px 5px rgba(0,0,0,0.1);
}
.cards img{
	width:100%;
	height:100%;
	object-fit:cover;
}
.cards .info{
	text-align:center;
	line-height:25px;
	
	
}
.info h4{
	font-weight:600;
	color:black;
	font-size:22px;
}
.cards .info h4:hover{
	cursor:pointer;
	border-bottom:2px solid #BD8A53;
	
	
	
}
.cards .discount{
	position:absolute;
	top:15px;
	left:15px;
	height:45px;
	width:45px;
	display:block;
	background:#BD8A53;
	color:white;
	font-weight:500;
	border-radius:50%;
	line-height:40px;
	text-align:center;
}
.cards .panel{
	position:absolute;
	top:18px;
	right:-50%;
	width:34px;
	background:rgba(0,0,0,0.8);
	display:flex;
	flex-flow:column;
	align-item:center;
	opacity:0;
}
.cards button{
	position:absolute;
	left:50%;
	top:60%;
	transform:translateX(-50%);
	height:38px;
	width:120px;
	border:none;
	outline:none;
	background:rgba(0, 0, 0, 0.7);
	color:white;
	font-size:15px;
	font-weight:600;
	cursor:pointer;
	opacity:0;
	transition-delay:.1s;
	transition:1s;
}
.cards .info .stars i{
	color: gold;
	padding:10px 0;
}
.cards .info .price{
	font-size:15px;
	letter-spacing:1px;
	font-weight:lighter
}
.cards .panel a{
	font-size:17px;
	color:white;
	margin:9px 0;
}
.cards:hover .panel{
	right:15px;
	opacity:1;
}
.cards .panel a:hover{
	color:#999;
}
.cards:hover button{
	opacity:1;
	bottom:;
}
.cards button:hover{
	background-color:#BD8A53;
}
@media screen and (max-width:748px)

{
	
	.cards .panel a{
		margin:13px;
	}
	.cards:hover .panel{
		right:18px;
	}
.cards .panel{
	position:absolute;
	margin-top:18px;
	right:-50%;
	width:47px;
	display:flex;
	flex-flow:column;
	align-item:center;
	opacity:0;
 }
 .cards .panel a{
	font-size:21px;
	align-item:center
	
 }
	.cards .discount{
     width:50px;
	}
	
	.cards button{
	position:absolute;
	left:50%;
	top:68%;
	transform:translateX(-50%);
	height:42px;
	width:170px;
	}
	.info h4{
		font-size:26px;
	}
	.cards .info .price{
		font-size:16px;
	}
}
@media screen and (max-width:500px)

{
	
	.cards .panel a{
		margin:10px;
	}
	.cards:hover .panel{
		right:16px;
	}
.cards .panel{
	position:absolute;
	margin-top:17px;
	right:-50%;
	width:40px;
	display:flex;
	flex-flow:column;
	align-item:center;
	opacity:0;
 }
 .cards .panel a{
	font-size:19px;
	align-item:center
	
 }
	.cards .discount{
     width:50px;
	}
	
	.cards button{
	position:absolute;
	left:50%;
	top:66%;
	transform:translateX(-50%);
	height:40px;
	width:152px;
	}
	.info h4{
		font-size:23px;
	}
	.cards .info .price{
		font-size:15px;
	}
}

@media screen and (min-width:1092px)

{
	
	.cards .panel a{
		margin:13px;
	}
	.cards:hover .panel{
		right:18px;
	}
.cards .panel{
	position:absolute;
	margin-top:18px;
	right:-50%;
	width:47px;
	display:flex;
	flex-flow:column;
	align-item:center;
	opacity:0;
 }
 .cards .panel a{
	font-size:21px;
	align-item:center
	
 }
	.cards .discount{
     width:50px;
	}
	
	.cards button{
	position:absolute;
	left:50%;
	top:68%;
	transform:translateX(-50%);
	height:42px;
	width:170px;
	}
	.info h4{
		font-size:26px;
	}
	.cards .info .price{
		font-size:16px;
	}
}

@media screen and (min-width:750px max-width:950px)

{
	
	.cards .panel a{
		margin:8px;
	}
	.cards:hover .panel{
		right:14px;
	}
.cards .panel{
	position:absolute;
    top:8px;
	right:-50%;
	width:32px;
	display:flex;
	flex-flow:column;
	align-item:center;
	opacity:0;
 }
 .cards .panel a{
	font-size:16px;
	align-item:center
	
 }
	.cards .discount{
     width:50px;
	}
	
	.cards button{
	position:absolute;
	left:50%;
	top:55%;
	transform:translateX(-50%);
	height:33px;
	width:110px;
	}
	.info h4{
		font-size:18px;
	}
	.cards .info .price{
		font-size:14px;
	}
}

    </style>
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Shop</h1>
</section>
<!-- end inner-banner -->
<div class="" align="center">
<div class="row box mt-4" align="center">

@foreach($shops as $shop)
{

            <div class="cards col-md-3 col-sm-4 col-6 pt-1 pb-1 ">
                <img src="{{ asset('uploads/shop/'.$shop['image']) }}" class="img-fluid" alt="">
                <div class="panel" align="center">
                    <a href=""> <i class="fa fa-eye"> </i></a>
                    <a href=""> <i  class="fas fa-shopping-cart"></i></a>
                </div>
                <p><a href="{{ route('shopping.productdetail' , $shop->id) }}"><button>Add To Cart</button></a></p>
                <div class="info">
                    <h4>{{ $shop['name'] }}</h4>
                    <strong class="price">Price: $ {{ $shop['price'] }}</strong>
                </div>

</div>


        }
        @endforeach
        </div>    
</div>

@include('layouts.footer')
