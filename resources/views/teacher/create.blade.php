@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Extra Area Chart</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     
                     <div class="form">
                        
                        <form>
                           <div class="form-group">
                              <label>Teacher</label>
                              <input type="text" name="course" class="form-control">
                           </div>
                           <div class="form-group">
                              <label>Designation</label>
                              <select id="inputState" class="form-control">
                                 <option selected>Choose...</option>
                                 <option>Lecturer</option>
                                 <option>Assistant Prof.</option>
                                 <option>Professor</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Department</label>
                              <select id="inputState" class="form-control">
                                 <option selected>Choose...</option>
                                 <option>CSE</option>
                                 <option>ECE</option>
                              </select>
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