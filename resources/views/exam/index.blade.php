@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
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
                     <a href="{{ route('exam.create')}}" class="btn btn-success mb-3">Add Exam</a>
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Year</th>
                                 <th>Term</th>
                                 <th>Session</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>First</td>
                                 <td>Second.</td>
                                 <td>Session</td>
                                 <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>1</td>
                                 <td>First</td>
                                 <td>Second.</td>
                                 <td>Session</td>
                                 <td>
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
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