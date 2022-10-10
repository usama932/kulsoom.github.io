<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="{{ route('my_account') }}"><img src="{{ asset(Auth::user()->photo) }}" width="38" height="38" class="rounded-circle" alt="photo"></a>
                    </div>
                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user font-size-sm"></i> &nbsp;{{ ucwords(str_replace('_', ' ', Auth::user()->user_type)) }}
                        </div>
                    </div>
                    <div class="ml-3 align-self-center">
                        <a href="{{ route('my_account') }}" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (Route::is('dashboard')) ? 'active' : '' }}">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            {{--Academics--}}
               @if(Qs::userIsAcademic() )
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['tt.index', 'ttr.edit', 'ttr.show', 'ttr.manage']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="icon-graduation2"></i> 
                    <span>Academics</span>
                </a>
                <ul class="nav nav-group-sub" data-submenu-title="Manage Academics">
                {{--Timetables--}}
                <li class="nav-item"><a href="{{ route('tt.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['tt.index']) ? 'active' : '' }}">Timetables</a></li>
                </ul>
                </li>
                @endif
                @if(Qs::userIsTeamSA())
                {{--Manage Users--}}
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['users.index', 'users.show', 'users.edit']) ? 'active' : '' }}"><i class="icon-users4"></i> <span> Users</span></a>
                </li>
                {{--Manage Classes--}}
                <li class="nav-item">
                    <a href="{{ route('classes.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['classes.index','classes.edit']) ? 'active' : '' }}"><i class="icon-windows2"></i> <span> Classes</span></a>
                </li>
                {{--Manage Subjects--}}
                <li class="nav-item">
                    <a href="{{ route('subjects.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}"><i class="icon-pin"></i> <span>Subjects</span></a>
                </li>
                @endif
                {{--Exam--}}
                @if(Qs::userIsTeamSAT())
                <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show', 'marks.batch_fix',]) ? 'nav-item-expanded nav-item-open' : '' }} ">
                    <a href="#" class="nav-link"><i class="icon-books"></i> <span> Exams</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Manage Exams">
                        @if(Qs::userIsTeamSA())
                        {{--Grades list--}}
                        <li class="nav-item">
                            <a href="{{ route('grades.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['grades.index', 'grades.edit']) ? 'active' : '' }}">Grades</a>
                        </li>
                        {{--Tabulation Sheet--}}
                        @endif
                        @if(auth()->user()->user_type == "teacher")
                        <li class="nav-item">
                            <a href="{{ route('quizzes.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : '' }}"><i class="icon-pin"></i> <span>Quizes</span></a>
                        </li>
                        @endif
                        @if(Qs::userIsTeamSAT())
                        {{--Marks Manage--}}
                        {{--Marksheet--}}
                        <!-- <li class="nav-item">
                            <a href="{{ route('marks.bulk') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.bulk', 'marks.show']) ? 'active' : '' }}">Marksheet</a>
                        </li> -->
                        @endif
                    </ul>
                </li>

                
                @if(Qs::userIsTeamSAT())
                   <!--  Student Attendance -->
                   
                   <li class="nav-item">
                        <a href="{{url('student/attendance')}}" class="nav-link {{ in_array(Route::currentRouteName(), ['student', 'student/*']) ? 'active' : '' }}"><i class="icon-user"></i> <span>{{ __('Student Attendance') }} </span></a>
                    </li>

                @endif
                    
              

                @endif
                {{-- Librarian--}}
                @if(Qs::userIsLibrarian() )
            <li class="nav-item nav-item-submenu {{ in_array(Route::currentRouteName(), ['books', 'book.edit','authors', 'authors.edit', 'categories', 'category.edit', 'publishers', 'publisher.edit','settings','book_issued', 'fine']) ? 'nav-item-expanded nav-item-open' : '' }} ">
                <a href="#" class="nav-link">
                    <i class="icon-graduation2"></i> 
                    <span>Library</span>
                </a>
                
            <ul class="nav nav-group-sub" data-submenu-title="Manage Library">
                {{--Librarian--}}
                <li class="nav-item"><a href="{{ route('book_issued') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['book_issued']) ? 'active' : '' }}">Books Issued</a></li>
                @if(Auth::user()->user_type != 'student')
                <li class="nav-item"><a href="{{ route('books') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['books','book.edit']) ? 'active' : '' }}">Books</a></li>
                <li class="nav-item"><a href="{{ route('authors') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['authors','authors.edit']) ? 'active' : '' }}">Authors</a></li>
                <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['categories', 'category.edit']) ? 'active' : '' }}">Categories</a></li>
                <li class="nav-item"><a href="{{ route('publishers') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['publishers', 'publisher.edit']) ? 'active' : '' }}">Publishers</a></li>
                @endif
                <!-- <li class="nav-item"><a href="{{ route('fine') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['fine']) ? 'active' : '' }}">Fine</a></li> -->
            </ul>
            </li>
                @endif
                {{-- Career --}}
                @if(Qs::userIsTeamSA() )
                <li class="nav-item">
                    <a href="{{ route('career.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['career.index']) ? 'active' : '' }}"><i class="icon-task"></i> <span>Career</span></a>
                </li>

                {{-- JobPosts --}}
    
                <li class="nav-item">
                    <a href="{{ route('jobs.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['jobs.index']) ? 'active' : '' }}"><i class="icon-task"></i> <span>Job Posts</span></a>
                </li>
                  {{-- StudentClass --}}
    
                <li class="nav-item">
                    <a href="{{ route('studentclass') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['studentclass']) ? 'active' : '' }}"><i class="icon-users"></i> <span>Students</span></a>
                </li>

                 {{-- Fees --}}
    
                <li class="nav-item">
                    <a href="{{ route('allclassfees') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['allclassfees']) ? 'active' : '' }}"><i class="icon-windows"></i> <span>Fees</span></a>
                </li>
                
                {{-- Admission --}}
    
                <li class="nav-item">
                    <a href="{{ route('admission.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['admission.index']) ? 'active' : '' }}"><i class="icon-graduation"></i> <span>Admission Applications</span></a>
                </li>

                {{-- Transport --}}
                <li class="nav-item">
                    <a href="{{ route('vans.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['vans.index']) ? 'active' : '' }}"><i class="icon-bus"></i> <span>Vans</span></a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('drivers') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['drivers']) ? 'active' : '' }}"><i class="icon-person"></i> <span>Drivers</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transport.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['trasnport.index']) ? 'active' : '' }}"><i class="icon-car"></i> <span>Transport</span></a>
                </li>



                {{-- Shop --}}
                <li class="nav-item">
                    <a href="{{ route('shop.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['shop.index']) ? 'active' : '' }}"><i class="icon-store"></i> <span>Shop</span></a>
                </li>

                {{-- Order --}}
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['order.index']) ? 'active' : '' }}"><i class="icon-cart"></i> <span>Orders</span></a>
                </li>

                {{-- Contact --}}
            
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['contact.index']) ? 'active' : '' }}"><i class="icon-envelope"></i> <span>Contact</span></a>
                </li>
                @endif
                {{--Manage Account--}}
                <li class="nav-item">
                    <a href="{{ route('my_account') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['my_account']) ? 'active' : '' }}"><i class="icon-user"></i> <span>My Account</span></a>
                </li>

            </ul>
        </div>
    </div>
</div>
