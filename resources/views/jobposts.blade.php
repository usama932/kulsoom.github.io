

@include('layouts.header')
<style>
   .bodyjob{
    background-color:#f8fafc
   }
.card-job{
    box-shadow:rgba(0,0,0,0.07) 2px 2px 5px 3px;
    border-radius:15px;
    background-color:white
}
.card-job h2{
    color:black;
}


.card-job .details{
    font-size:15px;
    margin-top:-10px
}

.card-job p{
}

.card-job .job-pos{
    background-color:#eee;
    border-radius:7px;
    color:#444
    
}

.card-job .job-sal{
    color:black;
}

.card-job .apply-btn a{
    text-decoration:none;
    color:white;
    
}

.card-job .apply-btn {
    background-color:#c67a09;
    width:109px;
    padding-top:5px;
    padding-bottom:5px;
    border-radius:1px;
    box-shadow:#fccaa9 1px 0px 1px 1px
  
}

.card-job .apply-btn:hover{
    background-color:#0c0b39;
    transition:0.7s
   
 
}
.filterjob .btns{
    background-color:#0c0b39;
    color:white;

}

@media screen and (max-width:912px)
{
.filterjob{
    display:none;
}
}
    </style>
    <div class="bodyjob">
<!-- start inner-banner -->
<section class="inner-banner">
    <h1 class="font-weight-bold text-center">Career</h1>
</section>
<!-- end inner-banner -->


<br><br>

<div class="container">
<div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
            <span class="title">Apply For Your Desired Job</span>
            <h2>Find a Career Opportunity</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>

<div class="row">
<div class="col-md-12 col-lg-8 col-sm-12 col-12 shopping" >
<br>
@forelse($jobs as $job)


<div class="row card-job px-2 py-2 pt-3 mb-4">
<div class="col-lg-2 col-md-2 col-sm-4 col-4 " align="center">
    <br>
<img src="{{ asset('assets/images/logo.jpeg') }}"  style="border-radius:10px; box-shadow:rgba(0,0,0,0.3) 2px 0px 1px 1px" width="80px" alt="image">
</div>

<div class="col-lg-7 col-md-7 col-sm-8 col-8 pl-3" >
<h3><b>{{ $job->jobname }}</b></h3>
    <p class="details">{{ $job->details}}</p>
    <p><span class="job-pos px-2 py-1"><b>{{ $job->position }}</b></span> &nbsp; &nbsp;  <i class="fa fa-clock" style="color:#999"></i> <span style="color:#444; font-weight:530; font-family:arial">{{ $job->jobtype}}</span></p>
</div>



<div class="col-lg-3 col-md-3 col-sm-6 col-6 " align="center">
   <p style="color:black; font-size:15px" class="mt-2">Rs. {{$job->salary}}</p>
   <p style="font-size:12px; color:#999; margin-top:-10px">{{$job->created_at}}</p>

   <p class="apply-btn" style="margin-top:30px"><a href="applyjob/{{$job->id}}"> Apply Now </a></p>

</div>

</div>

@empty
<p align="center" style="color:#333; font-size:18px" class="text-center" >No posts yet!</p>

@endforelse

</div>


<div class="col-lg-4  filterjob px-5 py-3 ">
 <h5><b>Search jobs</b></h5>
 <form method="GET" action="{{ route('searched') }}">
 @csrf
                                <div class="row">
                                <div class="co-lg-10 col-md-10">
                                <input type="text" class="form-control" placeholder="Search for jobs" required name="searchjob" style="box-shadow:rgba(0,0,0,0.07)2px 1px 2px 1px; border-radius:4px; background-color:white"/>
                                </div>
                                <div clas="col-lg-2 col-md-2">
                                <button type="submit" class="btns border-0 form-control" style="box-shadow:rgba(0,0,0,0.07)2px 1px 0px 1px; border-radius:4px"><i class="fa fa-search"></i></button>

                                </div>
                                </div>

              
</form>
<br>
<div class="card-job px-4 py-4 mt-1 filterjobitem" style="background-color:white">
<h5><b>Categories</b></h5>
<form method="GET" action="{{ route('filtfaculty') }}">
                        @csrf
                         <button type="submit" name="faculty" style="padding:0" class="mt-3 text-left border-0 form-control"> <i class="fa fa-chalkboard-teacher " style="color:#c67a09"></i> &nbsp; Faculty</button>
                        </form>

                        <form method="GET" action="{{ route('filtadmin') }}">
                        @csrf
                         <button type="submit" name="admin" style="padding:0" class="text-left border-0 form-control"> <i class="fa fa-user" style="color:#c67a09"></i> &nbsp; Admin</button>
                        </form>

                        <form method="GET" action="{{ route('filtassist') }}">
                        @csrf
                         <button type="submit" name="assistant" style="padding:0" class="text-left border-0 form-control"> <i class="fa fa-person" style="color:#c67a09"></i> &nbsp; Assistant</button>
                        </form>

                        <form method="GET" action="{{ route('jobposts') }}">
                        @csrf
                         <button type="submit" name="alljobs" style="padding:0" class="text-left border-0 form-control"> <i class="fa fa-tasks" style="color:#c67a09"></i> &nbsp; All Jobs</button>
                        </form>
</div>



<div class="card-job px-4 py-4 mt-3 filterjobitem" style="background-color:white">
<h5><b>Job Type</b></h5>
<form method="GET" action="{{ route('fulltime') }}">
                        @csrf
                         <button type="submit" name="fulltime" style="padding:0" class="mt-3 text-left border-0 form-control"> <i class="fa fa-clock " style="color:#c67a09"></i> &nbsp; Full Time</button>
                        </form>

                        <form method="GET" action="{{ route('parttime') }}">
                        @csrf
                         <button type="submit" name="parttime" style="padding:0" class="text-left border-0 form-control"> <i class="fa fa-clock" style="color:#c67a09"></i> &nbsp; Part Time</button>
                        </form>

                        <form method="GET" action="{{ route('jobposts') }}">
                        @csrf
                         <button type="submit" name="alljobs" style="padding:0" class="text-left border-0 form-control"> <i class="fa fa-tasks" style="color:#c67a09"></i> &nbsp; All Jobs</button>
                        </form>
</div>


</div>


</div>
</div>


<br><br>
<br>

</div>

@include('layouts.footer')
