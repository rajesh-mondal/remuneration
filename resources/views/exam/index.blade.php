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
                           @foreach($exams as $exam)
                              <tr>
                                 <td>{{ $loop->index+1 }}</td>
                                 <td>{{ $exam->year['year'] }}</td>
                                 <td>{{ $exam->term['term'] }}</td>
                                 <td>{{ $exam->session['session'] }}</td>
                                 <td class="d-flex">
                                    <a href="{{ route('exam.edit', $exam->id)}}" class="btn btn-primary mr-2">Edit</a>
                                    <form action="{{ route('exam.destroy', $exam->id) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')">Delete</button>
                                    </form>
                                 </td>
                              </tr>
                           @endforeach
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