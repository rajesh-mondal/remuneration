<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="index.html"><img class="logo_icon img-responsive" src="{{ url('assets/images/logo/logo_icon.png') }}" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img class="img-responsive" src="{{ url('assets/images/layout_img/user_img.jpg') }}" alt="#" /></div>
            <div class="user_info">
               <h6>{{Auth::user()->name}}</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <ul class="list-unstyled components">
         <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>

         @if(Auth::user()->is_admin == 1)
         <li><a href="{{ route('user.index')}}"><i class="fa fa-user green_color"></i> <span>User</span></a></li>
         @endif

         @if(Auth::user()->is_admin == 1)
         <li><a href="{{ route('role.index')}}"><i class="fa fa-user green_color"></i> <span>Role</span></a></li>
         @endif

         @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
         <li><a href="{{ route('course.index')}}"><i class="fa fa-server green_color"></i> <span>Course</span></a></li>
         @endif

         @if(Auth::user()->is_admin == 1 )
         <li><a href="{{ route('discipline.index')}}"><i class="fa fa-building green_color"></i> <span>Discipline</span></a></li>
         @endif

         @if(Auth::user()->is_admin == 1)
         <li><a href="{{ route('designation.index')}}"><i class="fa fa-building green_color"></i> <span>Designation</span></a></li>
         @endif

         @if(Auth::user()->is_admin == 1 ||
         Auth::user()->role['name'] == 'Admin' || Auth::user()->role['name'] == 'Accountant' || Auth::user()->role['name'] == 'Teacher' || Auth::user()->role['name'] == 'Staff' )
         <li>
            <a href="#element_rem" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-pencil-square-o green_color"></i> <span>Remuneration</span></a>
            <ul class="collapse list-unstyled" id="element_rem">
               @if(Auth::user()->role && (Auth::user()->role['name'] == 'Teacher' || Auth::user()->role['name'] == 'Staff'))
                  <li>
                     <a href="{{ route('myream.index')}}"><i class="fa fa-pencil-square-o white_color"></i> <span>My Remuneration</span></a>
                  </li>
               @endif

               @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
               <li>
                  <a href="{{ route('remuneration.index')}}"><i class="fa fa-pencil-square-o white_color"></i> <span>Remuneration</span></a>
               </li>
               @endif

               @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
               <li>
                  <a href="{{ route('remuneration.create')}}"><i class="fa fa-pencil-square-o white_color"></i> <span>Add Remuneration</span></a>
               </li>
               @endif

               @if(Auth::user()->role && Auth::user()->role['name'] == 'Accountant')
               <li>
                  <a href="{{ route('remuneration.newlist')}}"><i class="fa fa-pencil-square-o white_color"></i> <span>Remuneration New List</span></a>
               </li>
               @endif

               @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
                  <li>
                     <a href="{{ route('remuneration-category.index')}}"><i class="fa fa-folder-open white_color">
                  </i> <span>Remuneration Category</span></a></li>
               @endif

               @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
                  <li>
                     <a href="{{ route('remuneration-rate.index')}}"><i class="fa fa-dollar white_color"></i> <span>Remuneration Rate</span></a>
                  </li>
               @endif

            </ul>
         </li>
         @endif

         @if(Auth::user()->is_admin == 1)
         <li>
            <a href="#element_exam" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-book green_color"></i> <span>Exam</span></a>
            <ul class="collapse list-unstyled" id="element_exam">
               <li><a href="{{ route('exam.index')}}"><i class="fa fa-book white_color"></i><span>Exam</span></a></li>
               <li><a href="{{ route('year.index')}}"><i class="fa fa-calendar white_color"></i> <span>Year</span></a></li>
               <li><a href="{{ route('term.index')}}"><i class="fa fa fa-clock-o white_color"></i> <span>Term</span></a></li>
               <li><a href="{{ route('session.index')}}"><i class="fa fa fa-clock-o white_color"></i> <span>Session</span></a></li>
            </ul>
         </li>
         @endif

         <li>
            <a href="#element_settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cog red_color"></i> <span>Settings</span></a>
            <ul class="collapse list-unstyled" id="element_settings">
               <li><a href="{{ route('profile.edit') }}"><i class="fa fa-pencil yellow_color"></i><span>Edit Profile</span></a></li>
               <li><a href="{{ route('setting')}}"><i class="fa fa-key red_color"></i> <span>Change password</span></a></li>
            </ul>
         </li>

         <li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out red_color"></i> <span>Logout</span>
            </a>
        </li>
      </ul>
   </div>
</nav>