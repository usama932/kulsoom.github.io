<?php
use App\Http\Controllers\ShopController;
$total = ShopController::cartItem();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from einfosoft.com/flexweb_template/edusquad_theme/edusquad-preview/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jul 2022 18:34:19 GMT -->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Edusquad - Education Template">
    <!-- ========== Page Title ========== -->
    <title>SOUTHWELL</title>
    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpeg') }}" type="image/x-icon">
    <!-- ========== Google Fonts ========== -->
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
</head>
<!--start preloader-->
<div class="preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--end preloader-->
<div class="page-wrapper" id="page-wrapper">
    <!-- start top header -->

    <!-- end top header -->
    <!-- start main header -->
    <header class="main-header" id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="index.php">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" style="border-radius: 50px;" class="img-fluid" width="50" height="50" alt="Edusquad">
                </a>
                <span class="navbar-toggler">
                    <i class="ti-align-left" onclick="openNav()"></i>
                </span>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About</a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{ route('about') }}">Who We Are</a>
                                <a class="dropdown-item" href="{{ route('achievement') }}">Achievement</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                Student Corner
                            </a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{ route('student') }}">Student</a>
                                <a class="dropdown-item" href="{{ route('course') }}">Course</a>
                            </div>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('career') }}">Career</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobposts') }}">Career</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admission') }}">Admission Form</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shopping') }}">Shop</a>
                        </li>

                      
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if(Session::has('loginid'))

                        <li class="nav-item">
                             <p class="py-1 px-2 mt-1 mx-1" style="background-color:black; color: #eee; font-style:bold; font-family:arial; border-radius:14px">{{ Session::get('loginname')}}</p>

                        </li>
                        @endif
                       
                        @if(Session::has('loginid'))

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}"><img src="{{ 'bag1.png'}}" height="20" width="20"> {{ $total }} </a>
                        </li>
                        @endif




                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="{{ 'user1.png'}}" height="20" width="20">
                            </a>
                            <div class="dropdown-menu">

                            <!-- <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                <a class="dropdown-item" href="{{ route('custlogin') }}">Login</a>
                   -->

                

                     @if(Session::has('loginid'))
                        
                              <a class="dropdown-item" href="{{ route('customers.logout') }}">Logout</a>
                          
                      @else
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                <a class="dropdown-item" href="{{ route('custlogin') }}">Login</a>
                  
                      
                      
                           
                       
                        @endif
                       
                        
                       
                            </div>
                        </li>

                        <!-- @if(Session::has('loginid'))
                        {
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.logout') }}">Logout</a>
                        </li>

                        }
                        @endif -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end main header -->
    <!-- start side menu -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sidenav-links pt-4">

            <a href="{{ route('index') }}">Home</a>
            <button class="dropdown-btn">About Us
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('about') }}"> <i class="fa fa-caret-right mr-3"></i>Who We Are</a>
                <a href="{{ route('achievement') }}"><i class="fa fa-caret-right mr-3"></i>Achievement</a>
            </div>
            <!-- <button class="dropdown-btn">Student Corner
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('student') }}"><i class="fa fa-caret-right mr-3"></i>Student</a>

                <a href="{{ route('course') }}"><i class="fa fa-caret-right mr-3"></i>Course</a>
            </div> -->

            <!-- <a href="{{ route('career') }}">Career</a> -->
            <a href="{{ route('jobposts') }}">Career</a>

            <a href="{{ route('admission') }}">Admission Form</a>
            <a href="{{ route('shopping') }}">Shop</a>

            <a href="{{ route('contact') }}">Contact</a>

            <a href="{{ route('login') }}">Login</a>

            @if(Session::has('loginid'))
            <p class="py-1 px-2 mt-1 mx-1" style="background-color:black; color: #eee; font-style:bold; font-family:arial; border-radius:14px">{{ Session::get('loginname')}}</p>

            @endif

            @if(Session::has('loginid'))

<li class="nav-item">
    <a class="nav-link" href="{{ route('cart') }}"><img src="{{ 'bag1.png'}}" height="20" width="20"> {{ $total }} </a>
</li>
@endif
       
            <button class="dropdown-btn"><img src="{{ 'user1.png'}}" height="20" width="20">

                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                    @if(Session::has('loginid'))
                           <a href="{{ route('customers.logout') }}">Logout</a>
                     @else
                           <a href="{{ route('register') }}"><i class="fa fa-caret-right mr-3"></i>Register</a>
                          <a href="{{ route('custlogin') }}"><i class="fa fa-caret-right mr-3"></i>Login</a>
            
                     @endif
            </div>
        </div>
    </div>
                    </div>
    <!-- end side menu -->
