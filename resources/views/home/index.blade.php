@extends('layouts.app')

@section('content')
<div class="row column1">
   @if(Auth::user()->is_admin == 1)
      <div class="col-md-6 col-lg-4">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
                  <i class="fa fa-user yellow_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  <a href="{{ route('user.create') }}">
                     <p class="head_couter">Add User</p>
                  </a>
                  {{-- <p class="total_no">{{ \App\Models\User::count() }}</p> --}}               
               </div>
            </div>
         </div>
      </div>
   @endif 
   
   @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin')
      <div class="col-md-6 col-lg-4">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
                  <i class="fa fa-pencil-square-o blue1_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  {{-- <p class="total_no">Add Remuneration</p> --}}
                  <a href="{{ route('remuneration.create') }}">
                     <p class="head_couter">Add Remuneration</p>
                  </a>
               </div>
            </div>
         </div>
      </div>
   @endif
   <div class="col-md-6 col-lg-4">
      <div class="full counter_section margin_bottom_30">
         <div class="couter_icon">
            <div> 
               <i class="fa fa-cloud-download green_color"></i>
            </div>
         </div>
         <div class="counter_no">
            <div>
               {{-- <p class="total_no">1,805</p> --}}
               <a href="#">
                  <p class="head_couter">All Remuneration</p>
               </a>
            </div>
         </div>
      </div>
   </div>
   {{-- <div class="col-md-6 col-lg-3">
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
   </div> --}}
</div>
<div class="row column4 graph">

</div>

@endsection