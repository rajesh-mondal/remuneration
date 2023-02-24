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
      <h4>General</h4>
      <ul class="list-unstyled components">


         <li><a href="{{ route('dashboard')}}"><i class="fa fa-map purple_color2"></i> <span>Dashboard</span></a></li>
         <li><a href="{{ route('course.index')}}"><i class="fa fa-bar-chart-o green_color"></i> <span>Course</span></a></li>
         <li><a href="{{ route('teacher.index')}}"><i class="fa fa-bar-chart-o green_color"></i> <span>Teacher</span></a></li>
         <li><a href="{{ route('exam.index')}}"><i class="fa fa-bar-chart-o green_color"></i> <span>Exam</span></a></li>
         <li><a href="{{ route('remuneration.index')}}"><i class="fa fa-bar-chart-o green_color"></i> <span>Remuneration</span></a></li>
         <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
      </ul>
   </div>
</nav>