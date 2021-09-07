<div wire:poll>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            @if ($teacher != null)
                <div class="col-8">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <div class="avatar avatar-xl">
                                    @if($teacher->image_url == null)
                                    <span class="avatar-title rounded-circle">{{substr($teacher->name,0,2)}}</span> 
                                    @else
                                        <img src="{{asset($teacher->image_url)}}" alt="people" width="56" class="rounded-circle" />
                                    @endif
                                </div>
                            </div>
                            <div class="flex">
                                <h4 class="mb-0">{{$teacher->name}}</h4>
                                <p class="text-50 mb-0">{{$teacher->about_you}}</p>
                    
                            </div>
                        </div>
                    </div>
                    <div class="messaging">
                        <div class="inbox_msg">
                            <div class="mesgs">
                                <div id="chat" class="msg_history" style="height: 300px">
                                    @forelse ($messages as $message)
            
                                        @if ($message->sender_type == 'user' )
                                            <!-- Reciever Message-->
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p>{{ $message->message_text }}</p>
                                                    <span class="time_date">
                                                        {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                                </div>
                                            </div>
            
                                        @else
            
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"> <img
                                                        src="{{asset($teacher->image_url)}}" alt="sunil"> </div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>{{ $message->message_text }}</p>
                                                        <span
                                                            class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                                    </div>
                                                </div>
                                            </div>
            
                                        @endif
                                    @empty
                                            <h4 style="text-align: center">no messages</h4> 
                                    @endforelse
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <form wire:submit.prevent="sendMessage">
                                            <input onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                                class="write_msg" placeholder="type your message" />
                                            <button class="msg_send_btn" type="submit">send</button>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            @else
                <div class="col-8">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="mr-3">
                                <div class="avatar avatar-xl">

                                    @if(auth()->user()->image_url == null)
                                        <span class="avatar-title rounded-circle">{{substr(auth()->user()->name,0,2)}}</span> 
                                    @else
                                        <img src="{{asset(auth()->user()->image_url)}}" alt="people" width="56" class="rounded-circle" />
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="flex">
                                <h4 class="mb-0">{{auth()->user()->name}}</h4>
                                <p class="text-50 mb-0">{{auth()->user()->about_you}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-4"> 
                <div class="input-group input-group-merge input-group-rounded flex-nowrap">
                    <input type="text" wire:model="search" class="form-control form-control-prepended" placeholder="Filter members" />
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="material-icons">filter_list</span>
                        </div>
                    </div>
                </div>
                <div class="flex" data-perfect-scrollbar>
                    <div class="sidebar-heading" style="margin-top: 10px">teachers</div>
                    <ul class="list-group list-group-flush mb-3">
                        @forelse ($teachers as $s)
                            <li class="list-group-item px-4 py-12pt bg-light">
                                <a href="{{url('student/getchat')}}/{{$s->id}}" class="d-flex align-items-center position-relative">
                                    <span class="avatar avatar-xs avatar-online mr-3 flex-shrink-0">

                                        <img src="{{asset($s->image_url)}}" alt="Avatar" class="avatar-img rounded-circle">

                                    </span>
                                    <span class="flex d-flex flex-column" style="max-width: 175px;">
                                        <strong class="text-body">{{$s->name}}</strong>

                                        <span class="text-muted text-ellipsis">{{$s->about_you}}</span>

                                    </span>
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item px-3 py-12pt bg-light">
                                <h5>no teachers for this name </h5>
                            </li>
                        @endforelse


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>




