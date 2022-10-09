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

.team-text h2{
        text-transform: capitalize;

    }
    .team .team-text h2 {
    font-size: 27px;
    font-weight: 600;
    color: #aa9166;
}

.team .team-text p {
    margin: 0;
    color: #999999;
}

.team .team-social {
   position: absolute;
    width: calc(100% - 50px);
    height: 50px;
    top: -25px;
    left: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #aa9166;
    font-size: 0;
    transition: .5s;
}

.team .team-item:hover .team-social {
    width: 100%;
    left: 0;
}



.team .team-social h2 {
    display: inline-block;
    margin-right: 15px;
    text-align: center;
    color: #111;
    transition: .3s;
    font-style:normal;
    font-weight:600;
    font-family: initial


}

.team .team-text {
    position: relative;
    padding: 50px 15px 30px 15px;
    text-align: center;
    background: #0c0b39;
}

.team .team-social h2:last-child {
    margin-right: 0;
}


.team .team-social h2:hover {
    color: #ffffff;
}
.team .team-img img{
    object-fit:cover
}
.team div .btnt{
    background-color: #0c0b39;
    color:#aa9166;
    height:55px;
    padding-top:10px;
    border-radius:0;
    box-shadow: #aa9166 1px 3px 4px 2px;
    font-size:18px;
    font-weight:500;
    font-family: 'Roboto', sans-serif;


}
.team div .btnt button:hover{
	background-color: #aa9166;
    color:#0c0b39;

}

.team div .btnt:hover{
    background-color: #aa9166;
    color:#0c0b39;
    height:55px;
    transition:0.3s;
    padding-top:10px;
    border-radius:0;
    box-shadow: #0c0b39 2px 3px 4px 2px
}
@media screen and (min-width:1336px)
{
    .team .team-img img{
        height:300px;
    }
}
@media screen and (max-width:769px)
{
    .team .team-img img{
        height:280px;
    }
}
@media screen and (max-width:600px)
{
    .team .team-img img{
        height:420px;
    }
}

.input-container {
  display:flex;
  margin-bottom: 15px;
  
}
.search{
    width:28vw;
    align-items: center;
    
}
/* Style the form icons */
.input-container .icon {
  padding: 10px;
  padding-top:17px;
  background: #0c0b39;
  color: #aa9166;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  padding: 10px;
  outline: none;
  border: 2px solid #0c0b39;
  height:57px;

}

.input-field:focus {
  border: 2px solid #aa9166;
}


.input-icons i {
            position: absolute;
        }
          
        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }
          
        .icons {
            padding: 10px;
            padding-top:16px;
            padding-left:15px;
            min-width: 40px;
            color: #aa9166
        }
          
        .input-fields {
            width: 100%;
            padding: 10px;
            text-align: center;
            height:52px;
            border-radius:30px;
            border:2px solid #0c0b39;
        }
        .input-fields:focus {
            border-radius:30px;
            border:2px solid #aa9166;
            outline:none;

        }
        .input-fields:focus .icons{
            color:#0c0b39;
        }
.searchbox{
    width:40vw;
}
@media screen and (max-width:800px)
{
    .searchbox{
    width:70vw;
}
}


.team {
    position: relative;
    width: 100%;
    padding: 45px 0 15px 0;
}

.team .team-item {
    margin-bottom: 30px;
}

.team .team-img {
    position: relative;
	padding:0px;
	border:none

}

.team .team-img img {
    width: 100%;
	object-fit: cover;

}

.team .team-text {
    position: relative;
    padding: 50px 15px 30px 15px;
    text-align: center;
    background: #0c0b39;
}

.team .team-text h2 {
    font-size: 22px;
    font-weight: 600;
    color: #aa9166;
}

.team .team-text p {
    margin: 0;
    color: #999999;
}

.team .team-item:hover .team-social {
    width: 100%;
    left: 0;
}
.team .btnt a:hover{
    text-decoration: none;
    color:#0c0b39;
}
.team .btnr{
    background-color:#0c0b39;
    color:white;
    font-family:arial
}
.team .btns{
    background-color:#c67a09;
    color:white;
}
.team .btns:hover{
    background-color:#0c0b39;
    color:white;
}
.team .btnr:hover{
    background-color:#c67a09;
    color:white;
    font-family:arial
}

.team a{
    text-decoration:none;
    color:#aa9166
}

.team form button:focus{
    box-shadow:none;
    outline:none;
    border:none;
}
 .team input:focus{
    box-shadow:none;
    outline:none;
    border:1px solid #666;
}

.containerck {
  display: block;
  position: relative;
  padding-left:35px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.containerck input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.containerck:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containerck input:checked ~ .checkmark {
  background-color: black;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.containerck input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.containerck .checkmark:after {
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

.team button .inpchk:focus{

    border:none;
    outline:none;
    box-shadow:none;
}
    </style>

<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Shop</h1>
</section>
<br><br>
<div class="container-fluid ">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Book Store</span>
            <h2>Shop Your Favorite Book</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <!-- <form method="GET" action="{{ route('search') }}">
            @csrf
        <input type="text" required name="search" placeholder="search..">
        <input type="submit" name="submit"> </form>-->
<div class="team">
   <div class="row pl-5 pr-5" id="find">
       <div class="col-lg-3 col-md-4 col-12">
                    <div class="search-student border px-4 py-3">
                        <h4 class="font-weight-bold color-orange">Search Book</h4>
                        <form method="GET" action="{{ route('search') }}">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" required name="search" placeholder="search..">
                            </div>

                            <button type="submit" class="btns theme-orange border-0 form-control">Search Now</button>
                        </form>
                    </div>

                    <hr>
                    <div class="search-student border px-4 py-3">
                        <h4 class="font-weight-bold color-orange">Filter</h4>
                        <h6 class="mb-2 mt-3"><b>Category</b></h6>
                        <form method="GET" action="{{ route('filtit') }}">
                        @csrf
                         <button type="submit" name="filterit" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Computer</button>
                        </form>

                        <form method="GET" action="{{ route('filtsc') }}">
                        @csrf
                            <button type="submit" name="filtersc" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Science</button>
                        </form>

                        <form method="GET" action="{{ route('filtmed') }}">
                        @csrf
                            <button type="submit" name="filtermed" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Medical</button>
                        </form>

                        <form method="GET" action="{{ route('filtart') }}">
                        @csrf
                            <button type="submit" name="filterart" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Arts</button>
                        </form>

                        <form method="GET" action="{{ route('filtcom') }}">
                        @csrf
                            <button type="submit" name="filtercom" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Commerce</button>
                        </form>

                        <form method="GET" action="{{ route('filtpt') }}">
                        @csrf
                            <button type="submit" name="filterpt" style="padding:0" class="text-left border-0 form-control"> - &nbsp; Poetry</button>
                        </form>

                        <h6 class="mb-3 mt-4"><b>Price</b></h6>
                        <form method="GET" action="{{ route('lowprice') }}">
                        @csrf
                        <button type="submit" id="lp" name="lowprice" style="padding:0; color: #111" class="text-left border-0 form-control"> 
                        <label class="containerck mt-1" > $0 - $100
                        <input type="radio" name="price" class="inpchk">
                        <span class="checkmark"></span>
                        </button>
 
                        </form>

                        <form method="GET" action="{{ route('midprice') }}" onclick="mid()">
                        @csrf
                        <button type="submit" id="mp" onclick="mid()" name="midprice" style="padding:0; color: #111" class="text-left border-0 form-control"> 
                        <label class="containerck mt-1" onclick="mid()" > $100 - $200
                        <input type="radio" name="price" class="inpchk" onclick="mid()" >
                        <span class="checkmark"></span>
                        </button>
                        </form>

                        <form method="GET" action="{{ route('highprice') }}" onclick="high()">
                        @csrf
                        <button type="submit" id="hp" onclick="high()" name="midprice" style="padding:0; color: #111" class="text-left border-0 form-control"> 
                        <label class="containerck mt-1" onclick="high()" > $200 +
                        <input type="radio" name="price" class="inpchk" onclick="high()" >
                        <span class="checkmark"></span>
                        </button>
                        </form>

                        <script>


                              function low(){
                                 document.getElementById("lp").checked == true;
                                
			 
                              }

                              function mid(){
                                 document.getElementById("mp").checked == true;
                                
			 
                              }

                              function high(){
                                 document.getElementById("hp").checked == true;
                                
			 
                              }


                             
                        </script>

                        <form class="mt-4" method="GET" action="{{ route('shopping') }}">
                        @csrf
                        <button type="submit" class="btnr border-0 form-control">Reset Filter</button>
                        </form>

                    </div>

                    <div class="video my-4" data-aos="zoom-in" data-aos-duration="1000">
                        <img class="img-fluid" src="assets/images/event_1.jpg" alt="video">
                        <!-- <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-fancybox="gallery"
                           class="video-btn text-white">
                            <i class="fa fa-play-circle fa-3x"></i>
                        </a> -->
                    </div>
                </div>
                   

 
                     <div class="col-lg-9 col-md-8 col-12">
                        <div class="row">
                        @forelse($shops as $shop)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-5 findl">
                        
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{ asset('uploads/shop/'.$shop['image']) }}" width="100%" height="270px">
                                </div>
								
                                <div class="team-text">
                                    <h2> {{ $shop['name'] }}</h2>
                                    <p style="color:#eee">Price: $ {{ $shop['price'] }}</p>
                                    <div class="team-social">
                                    <h2 class="pt-2" style="color: #111; font-size: 17px; font-family:initial"> {{ $shop['category'] }} </h2>
                                  </div>
                                </div>
                            </div>
							<form method="post" action="{{ route('cart') }}">
							@csrf
					<input type="hidden" name="productid" value="{{ $shop['id'] }}">

					<div align="center"><input type="number" min="1" required placeholder="Quantity" name="qty" style="height:32px; width:90px; padding:4dp border:1px solid #999">
                    </div>
                            <button class="btnt btn-block mt-2"><a href="" class=""><div align="center">Add to Cart </div></a></button>

							<br>
                        </div>
						</form>

                        @empty
                        <div align="center">
                            <h4 align="center" style="color:darkred; padding:10px">No Data Found!</h4>
                        </div>
						@endforelse                 
             </div>                    
         </div> 
      </div>
   </div>
</div>
</div>

@include('layouts.footer')
