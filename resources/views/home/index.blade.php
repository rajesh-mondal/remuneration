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
                  <a href="{{ route('remuneration.create') }}">
                     <p class="head_couter">Add Remuneration</p>
                  </a>
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
                  <i class="fa fa-cloud-download green_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  <a href="{{ route('remuneration.newlist') }}">
                     <p class="head_couter">All Remuneration</p>
                  </a>
               </div>
            </div>
         </div>
      </div>
   @endif

   @if(Auth::user()->is_admin == 1 || Auth::user()->role['name'] == 'Admin' || Auth::user()->role['name'] == 'Accountant')
      <div class="col-md-6 col-lg-4">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
                  <i class="fa fa-search blue1_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  <a href="{{ route('remuneration.index') }}">
                     <p class="head_couter">Filter Remuneration</p>
                  </a>            
               </div>
            </div>
         </div>
      </div>
   @endif
   
   @if(Auth::user()->role && (Auth::user()->role['name'] == 'Teacher' || Auth::user()->role['name'] == 'Staff'))
      <div class="col-md-6 col-lg-4">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
                  <i class="fa fa-search blue1_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  <a href="{{ route('myream.index') }}">
                     <p class="head_couter">My Remuneration</p>
                  </a>            
               </div>
            </div>
         </div>
      </div>
   @endif

   @if(Auth::user()->role && Auth::user()->role['name'] == 'Accountant')
      <div class="col-md-6 col-lg-4">
         <div class="full counter_section margin_bottom_30">
            <div class="couter_icon">
               <div> 
                  <i class="fa fa-pencil-square-o blue1_color"></i>
               </div>
            </div>
            <div class="counter_no">
               <div>
                  <a href="{{ route('remuneration.newlist') }}">
                     <p class="head_couter">Recent Remuneration</p>
                  </a>            
               </div>
            </div>
         </div>
      </div>
   @endif
</div>
<div class="row column4 graph">

</div>

@endsection