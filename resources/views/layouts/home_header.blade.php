            <div class="navbar navbar-expand navbar-light border-bottom-2" id="default-navbar" data-primary>

                <!-- Navbar toggler -->
                <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
                    <span class="material-icons">short_text</span>
                </button>

                <!-- Navbar Brand -->
                <a href="mini-secondary-index.html" class="navbar-brand mr-16pt d-lg-none">
                    <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

                        <span class="avatar-title rounded bg-primary"><img src="assets/images/illustration/student/128/white.svg" alt="logo" class="img-fluid" /></span>

                    </span>

                    <span class="d-none d-lg-block">Edu Course</span>
                </a>

                <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
                    <li class="nav-item active">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{url('admin/login')}}"  data-caret="nav-link">Admin</a>
                    </li>
                </ul>





                <ul class="nav navbar-nav ml-auto mr-0">
                    @if(!auth()->check())
                        <li class="nav-item">
                            <a href="/login" class="nav-link" data-toggle="tooltip" data-title="Login" data-placement="bottom" data-boundary="window"><i class="material-icons">lock_open</i></a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn btn-outline-dark">Get Started</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="student/dashboard" class="btn btn-outline-dark">your dashboard</a>
                        </li>
                    @endif
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="bx bx-log-out"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>