<div class="topbar">
   <nav class="navbar navbar-expand-lg navbar-light">
      <div class="full">
         <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
         <div class="logo_section">
            <a href="index.html"><img class="img-responsive" src="#" alt="" /></a>
         </div>
         <div class="right_topbar">
            <div class="icon_info">
               <ul>
                  <li><a href="{{ route('notification.index') }}"><i class="fa fa-bell-o"></i><span class="badge">{{ Auth::user()->unreadNotifications->count() }}</span></a></li>
                  <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                  <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
               </ul>
               <ul class="user_profile_dd">
                  <li>
                     <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ url('assets/images/layout_img/user_img.jpg') }}" alt="#" /><span class="name_user">{{Auth::user()->name}}</span></a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('setting') }}">Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</div>