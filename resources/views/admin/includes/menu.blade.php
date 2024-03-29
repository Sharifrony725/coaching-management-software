<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class=""><a class="dropdown-item" href="{{ route('students.create') }}">Registration</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('students.index') }}">All Current Student List</a></li>
                    <li class=""><a class="dropdown-item" href="#">Batch Wise List</a></li>
                    <li class=""><a class="dropdown-item" href="{{ route('class.wise.list') }}">Class Wise List</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('image.gallery') }}">Gallery</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="{{ route('student.type') }}">Student Type</a>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">User</a>
                        <ul class="dropdown-menu">
                             @if(Auth::user()->role == 'Admin')
                            <li><a href="{{ route('user_registration_form') }}" class="dropdown-item">Add User</a></li>
                            <li><a href="{{ route('user.list') }}" class="dropdown-item">User List</a></li>
                             @endif
                            <li><a href="{{ route('user.profile',['UserId' => Auth::user()->id]) }}" class="dropdown-item">User Profile</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">School</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('schools.create') }}" class="dropdown-item">Add School</a></li>
                            <li><a href="{{ route('schools.index') }}" class="dropdown-item">School List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Class</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('classes.create') }}" class="dropdown-item">Add Class</a></li>
                            <li><a href="{{ route('classes.index') }}" class="dropdown-item">Class List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('batches.create') }}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{ route('batches.index') }}" class="dropdown-item">Batch List</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">General</a>
                        <ul class="dropdown-menu">
                            @if(!isset($header_footer_info))
                                <li><a href="{{ route('add.header.footer') }}" class="dropdown-item">Add Header & Footer</a></li>
                            @endif
                            @if(isset($header_footer_info))
                                <li><a href="{{ route('manage.header.footer') }}" class="dropdown-item">Manage Header & Footer</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Slider</a>
                        <ul class="dropdown-menu">
                            {{-- @if(!isset($header_footer_info)) --}}
                                <li><a href="{{ route('add.slider') }}" class="dropdown-item">Add Slider</a></li>
                            {{-- @endif
                            @if(isset($header_footer_info)) --}}
                                <li><a href="{{ route('slider.list') }}" class="dropdown-item">Slider List</a></li>
                            {{-- @endif --}}
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>
    <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
     {{-- <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a> --}}
    </form>
        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->
