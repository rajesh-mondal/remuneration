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
               <h6>John David</h6>
               <p><span class="online_animation"></span> Online</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <ul class="list-unstyled components">
         <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
         <li><a href="{{ route('course.index')}}"><i class="fa fa-server green_color"></i> <span>Course</span></a></li>
         <li><a href="{{ route('teacher.index')}}"><i class="fa fa-user green_color"></i> <span>Teacher</span></a></li>
         <li><a href="{{ route('exam.index')}}"><i class="fa fa-book green_color"></i> <span>Exam</span></a></li>
         <li><a href="{{ route('remuneration.index')}}"><i class="fa fa-pencil red_color"></i> <span>Remuneration</span></a></li>
         <li><a href="{{ route('discipline.index')}}"><i class="fa fa-building green_color"></i> <span>Descipline</span></a></li>
         <li><a href="{{ route('designation.index')}}"><i class="fa fa-building green_color"></i> <span>Designation</span></a></li>
         <li><a href="{{ route('year.index')}}"><i class="fa fa-calendar green_color"></i> <span>Year</span></a></li>
         <li><a href="{{ route('term.index')}}"><i class="fa fa-clock-o orange_color"></i> <span>Term</span></a></li>
         <li><a href="{{ route('session.index')}}"><i class="fa fa-clock-o orange_color"></i> <span>Session</span></a></li>
         <li>
            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
            <ul class="collapse list-unstyled" id="element">
               <li><a href="{{ route('exam.index')}}"><i class="fa fa-book white_color"></i><span>Exam</span></a></li>
               <li><a href="{{ route('year.index')}}"><i class="fa fa-calendar white_color"></i> <span>Year</span></a></li>
               <li><a href="{{ route('term.index')}}"><i class="fa fa-clock-o orange_color"></i> <span>Term</span></a></li>
               <li><a href="{{ route('session.index')}}"><i class="fa fa-clock-o orange_color"></i> <span>Session</span></a></li>
            </ul>
         </li>
         <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
      </ul>
   </div>
</nav>