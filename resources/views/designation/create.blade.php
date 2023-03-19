@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Add New Designation</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     
                     <div class="form">
                        
                        <form action="{{ route('designation.store')}}" method="post">
                           @csrf
                           <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="name" id="name" class="form-control">
                              @if($errors->has('name'))
                              <small style="color:red">{{ $errors->first('name') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end graph -->


@endsection