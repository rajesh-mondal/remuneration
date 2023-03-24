@extends('layouts.app')

@section('content')
<div class="row column1">
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-user yellow_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">2500</p>
               <p class="head_couter">Welcome</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-clock-o blue1_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">123.50</p>
               <p class="head_couter">Average Time</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-cloud-download green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">1,805</p>
               <p class="head_couter">Collections</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-lg-3">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-comments-o red_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               <p class="total_no">54</p>
               <p class="head_couter">Comments</p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row column4 graph">
   <div class="col-md-6 margin_bottom_30">
      <div class="dash_blog">
         <div class="dash_blog_inner">
            <div class="dash_head">
               <h3><span><i class="fa fa-calendar"></i> 6 July 2018</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
            </div>
            <div class="list_cont">
               <p>Today Tasks for Ronney Jack</p>
            </div>
            <div class="task_list_main">
               <ul class="task_list">
                  <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>10:00 AM</strong></li>
                  <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                  <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>11:00 AM</strong></li>
                  <li><a href="#">Create new task for Dashboard</a><br><strong>10:00 AM</strong></li>
                  <li><a href="#">Meeting about plan for Admin Template 2018</a><br><strong>02:00 PM</strong></li>
               </ul>
            </div>
            <div class="read_more">
               <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <div class="dash_blog">
         <div class="dash_blog_inner">
            <div class="dash_head">
               <h3><span><i class="fa fa-comments-o"></i> Bank Updates</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
            </div>
            <div class="list_cont">
               <p>Bank confirmation</p>
            </div>
            <div class="msg_list_main">
               <ul class="msg_list">
                  <li>
                     <span><img src="images/layout_img/msg2.png" class="img-responsive" alt="#" /></span>
                     <span>
                        <span class="name_user">Herman Beck</span>
                        <span class="msg_user">Sed ut perspiciatis unde omnis.</span>
                        <span class="time_ago">12 min ago</span>
                     </span>
                  </li>
                  <li>
                     <span><img src="images/layout_img/msg3.png" class="img-responsive" alt="#" /></span>
                     <span>
                        <span class="name_user">John Smith</span>
                        <span class="msg_user">On the other hand, we denounce.</span>
                        <span class="time_ago">12 min ago</span>
                     </span>
                  </li>
                  <li>
                     <span><img src="images/layout_img/msg2.png" class="img-responsive" alt="#" /></span>
                     <span>
                        <span class="name_user">John Smith</span>
                        <span class="msg_user">Sed ut perspiciatis unde omnis.</span>
                        <span class="time_ago">12 min ago</span>
                     </span>
                  </li>
                  <li>
                     <span><img src="images/layout_img/msg3.png" class="img-responsive" alt="#" /></span>
                     <span>
                        <span class="name_user">John Smith</span>
                        <span class="msg_user">On the other hand, we denounce.</span>
                        <span class="time_ago">12 min ago</span>
                     </span>
                  </li>
               </ul>
            </div>
            <div class="read_more">
               <div class="center"><a class="main_bt read_bt" href="#">Read More</a></div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection