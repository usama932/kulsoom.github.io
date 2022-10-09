<!DOCTYPE html>
<html lang="en">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800&amp;display=swap" rel="stylesheet">
    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="../../../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js" integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
.bodyback{
border-radius:25px
}
    </style>
</head>
<!--start preloader-->

<!--end preloader-->
@php 
$jobid = $id

@endphp


<body class="theme-blue">
<div class="container py-5 px-5" >


<div class="row bodyback " style="background-color:white">
<div class="col-md-5 col-lg-5 col-12" style="background-image:url({{ asset('assets/images/course_8.png') }}); background-repeat: no-repeat; background-size:cover; border-radius:20px">
<!-- <img src="{{ asset('assets/images/course_8.png') }}" height="100%" width="100%"/> -->
</div>

<div class="col-md-7 col-lg-7 col-12 border-left px-5 py-4">
    <div align="center">
<h4 style="color: black" class=""><b>Send your resume for that job</b></h4>

</div>
<form method="post" enctype="multipart/form-data" action="{{ route('applied') }}" data-fouc>
                    @csrf
                            <div class="form-group">
                                <label style="color:#333; font-size:15px">Name:</label>
                                <input class="form-control" id="exampleInputName" name="name" placeholder="Enter Name" type="text" required>
                            </div>
                            <div class="form-group">
                            <label style="color:#333; font-size:15px">Email:</label>
                                <input class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" type="email" required>
                            </div>
                        
                        <input type="hidden" name="jobid" value=" {{ $jobid }}">

                            <div class="form-group">
                            <label style="color:#333; font-size:15px">Phone Number:</label>
                                <input class="form-control" id="exampleInputNumber" name="phone" placeholder="Enter Number" type="text" required>
                            </div>
                          
                        <div class="form-group">
                        <label style="color:#333; font-size:15px">Message:</label>
                            <textarea class="form-control" name="message" id="exampleInputMessage" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <!-- <span class="mb-0 resume">Drop Your Resume</span> -->
                                <label style="color:#333; font-size:15px">Upload Resume:</label>

                                <input class="form-control-file pl-0 border-0" id="resume" name="resume" type="file">
                            </label>
                        </div>
                        <button class="btn theme-orange border-0" type="submit">Send Message</button>
                    </form>
</div>
</div>
</div>


</div>
</div>
</html>