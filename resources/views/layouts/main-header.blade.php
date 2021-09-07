<!-- Header -->


<div class="navbar navbar-expand pr-0 navbar-light border-bottom-2" id="default-navbar" data-primary>
    <!-- Navbar toggler -->
    <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
        <span class="material-icons">short_text</span>
    </button>

    <!-- Navbar Brand -->
    <a href="mini-index.html" class="navbar-brand mr-16pt d-lg-none">

        <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

            <span class="avatar-title rounded bg-primary"><img src="{{asset('assets/images/illustration/student/128/white.svg')}}" alt="logo" class="img-fluid" /></span>

        </span>

        <span class="d-none d-lg-block">Luma</span>
    </a>









    {{-- <form class="search-form navbar-search d-none d-md-flex mr-16pt" action="mini-index.html">
        <button class="btn" type="submit"><i class="material-icons">search</i></button>
        <input type="text" class="form-control" placeholder="Search ...">
    </form> --}}


    <div class="flex"></div>





    <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">

        @if (auth('teacher')->check())
            <!-- Notifications dropdown -->
            <div class="nav-item dropdown dropdown-notifications dropdown-xs-down-full" data-toggle="tooltip" data-title="Messages" data-placement="bottom" data-boundary="window">
                <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-caret="true">
                    <i class="material-icons icon-24pt">mail_outline</i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" style="overflow: auto;height: 250px;">
                    <div data-perfect-scrollbar class="position-relative">
                        <div class="dropdown-header"><h5>Messages</h5></div>
                        <div class="d-flex">
                            <span class="badge badge-pill badge-warning mr-auto my-auto float-left"><a
                                    href="{{url('teacher/MarkAsReadAll  ')}}">Set Read All</a></span>
                        </div>
                        <div id="notifications_count" class="dropdown-header"><h6>The number of unread messages {{ auth()->user()->unreadNotifications->count() }}</h6></div>

                        <div id="unreadNotifications" class="list-group list-group-flush mb-0" >
                            @foreach (auth()->user()->unreadNotifications as $notification)
                                
                                    <a href="{{url('teacher/getchat',[$notification->data['id'],$notification->id])}}" class="list-group-item list-group-item-action">
                                        <span class="d-flex">
                                            <span class="avatar avatar-xs mr-2">
                                            @if($notification->data['image_url'] == null)
                                                <span class="avatar avatar-sm mr-8pt2">
                                                    <span class="avatar-img rounded-circle"><i class="material-icons">account_box</i></span>
                                                </span>   
                                            @else
                                                <img src="{{ $notification->data['image_url'] }}" alt="people" class="avatar-img rounded-circle">
                                            @endif
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                <strong class="text-black-100">{{ $notification->data['title'] }}</strong>
                                                <span class="text-black-70">{{ $notification->data['user_name'] }}</span>
                                            </span>
                                        </span>
                                        <span class="d-flex align-items-center mb-1">
                                            <small class="text-black-50">{{ $notification->created_at }}</small>
                                        </span>
                                    </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- // END Notifications dropdown -->  
        @endif

        @if (auth('user')->check())
        <!-- Notifications dropdown -->
        <div class="nav-item dropdown dropdown-notifications dropdown-xs-down-full" data-toggle="tooltip" data-title="Messages" data-placement="bottom" data-boundary="window">
            <button class="nav-link btn-flush dropdown-toggle" type="button" data-toggle="dropdown" data-caret="true">
                <i class="material-icons icon-24pt">mail_outline</i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" style="overflow: auto;height: 250px;">
                <div data-perfect-scrollbar class="position-relative">
                    <div class="dropdown-header"><h5>Messages</h5></div>
                    <div style="width: 100%">
                        <span style="width: 100%" class="badge badge-pill badge-warning mr-auto my-auto"><a
                            style="width: 100%" href="{{url('student/MarkAsReadAll')}}">Set Read All</a></span>
                    </div>
                    <div id="notifications_count1" class="dropdown-header"><h6>The number of unread messages {{ auth()->user()->unreadNotifications->count() }}</h6></div>

                    <div id="unreadNotifications1" class="list-group list-group-flush mb-0" >
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            
                                <a href="{{url('student/getchat',[$notification->data['id'],$notification->id])}}" class="list-group-item list-group-item-action">
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                        @if($notification->data['image_url'] == null)
                                            <span class="avatar avatar-sm mr-8pt2">
                                                <span class="avatar-img rounded-circle"><i class="material-icons">account_box</i></span>
                                            </span>   
                                        @else
                                            <img src="{{ $notification->data['image_url'] }}" alt="people" class="avatar-img rounded-circle">
                                        @endif
                                        </span>
                                        <span class="flex d-flex flex-column">
                                            <strong class="text-black-100">{{ $notification->data['title'] }}</strong>
                                            <span class="text-black-70">{{ $notification->data['user_name'] }}</span>
                                        </span>
                                    </span>
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $notification->created_at }}</small>
                                    </span>
                                </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- // END Notifications dropdown -->  
    @endif


        <!-- Notifications dropdown -->
        <div class="nav-item ml-16pt dropdown dropdown-notifications dropdown-xs-down-full" data-toggle="tooltip" data-title="Notifications" data-placement="bottom" data-boundary="window">
        </div>
        <!-- // END Notifications dropdown -->


        <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown" data-caret="false">

                @if(auth()->user()->image_url == null)
                <span class="avatar avatar-sm mr-8pt2">
                    <span class="avatar-title rounded-circle bg-primary"><i class="material-icons">account_box</i></span>
                </span>   
                @else
                    <img src="{{asset(auth()->user()->image_url)}}" alt="people" width="56" class="rounded-circle" />
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                class="bx bx-log-out"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
        </div>
    </div>
</div> 





            <!-- // END Header -->