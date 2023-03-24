@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Remuneration List</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     <a href="{{ route('remuneration.create')}}" class="btn btn-info mb-3">Add New Remuneration</a>
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead class="thead-light">
                              <tr>
                                 <th>#</th>
                                 <th>Discipline</th>
                                 <th>Session</th>
                                 <th>Year</th>
                                 <th>Term</th>
                                 <th>Exam Date</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>CSE</td>
                                 <td>2019-2020</td>
                                 <td>Third</td>
                                 <td>First</td>
                                 <td>03-03-2023</td>
                                 <td>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>CSE</td>
                                 <td>2019-2020</td>
                                 <td>Third</td>
                                 <td>First</td>
                                 <td>03-03-2023</td>
                                 <td>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                 </td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>CSE</td>
                                 <td>2019-2020</td>
                                 <td>Third</td>
                                 <td>First</td>
                                 <td>03-03-2023</td>
                                 <td>
                                    <a href="#" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
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