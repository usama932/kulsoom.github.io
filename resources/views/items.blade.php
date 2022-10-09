<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title></title>
        

        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@1,600;1,700;1,800&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    
    </head>
<style>
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
    background: #121518;
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
.team div .btn{
    background-color: #121518;
    color:#aa9166;
    height:53px;
    padding-top:10px;
    border-radius:0;
    box-shadow: #aa9166 1px 3px 4px 2px;
    font-size:18px;
    font-weight:500;
    font-family: 'Roboto', sans-serif;


}

.team div .btn:hover{
    background-color: #aa9166;
    color:#121518;
    height:53px;
    padding-top:11px;
    border-radius:0;
    box-shadow: #121518 2px 3px 4px 2px
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
  background: #121518;
  color: #aa9166;
  min-width: 50px;
  text-align: center;
}

/* Style the input fields */
.input-field {
  padding: 10px;
  outline: none;
  border: 2px solid #121518;
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
            border:2px solid #121518;
        }
        .input-fields:focus {
            border-radius:30px;
            border:2px solid #aa9166;
            outline:none;

        }
        .input-fields:focus .icons{
            color:#121518;
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
</style>
    <body>
     

<script>
        $(document).ready(function(){
          $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#find .findl").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>




    <br>

   
   

            <!-- Team Start -->
            <div class="team">
                <div class="container">
                    <div class="section-header">
                        <h2>Meet Our Expert Attorneys</h2>
                    </div>
                    <div align="center">
<div class="searchbox">
<div class="container">
      <div class="input-icons">
        <i class="fa fa-search icons"></i>
         <input class="input-fields" id="search" placeholder=" Search.." type="text">
      </div>
    </div>
    
</div>
</div>
<br><br>
                    <div class="row" id="find">
                   <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-5 findl">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="user1.png" width="100%" height="240px">
                                </div>
                                <div class="team-text">
                                    <h2>ug</h2>
                                    <p>g</p>
                                    <div class="team-social">
                                    <h2 class="pt-2" style="color: #111; font-size: 17px; font-family:initial"> gg </h2>
                                  </div>
                                </div>
                            </div>
                            <div align="center"><a href="" class="btn btn-block">View Profile<!--<i class="fa fa-eye"></i>--></a></div>
                          <br>
                        </div>
                        
                    
                       </div>
                       
            <!-- Team End -->
                                </div>
                                </div>

           
    </body>
</html>
