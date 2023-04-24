@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Add New Remuneration</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     
                     <div class="form">
                        <form method="post" id="dynamic_form">
                           @csrf

                           <div class="row">
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="">Discipline</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($disciplines as $discipline)
                                          <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="">Year</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($exams as $exam)
                                          <option value="{{ $exam->id }}">{{ $exam->year['year'] }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="">Term</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($exams as $exam)
                                          <option value="{{ $exam->id }}">{{ $exam->term['term'] }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label for="">Session</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($exams as $exam)
                                          <option value="{{ $exam->id }}">{{ $exam->session['session'] }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <!-- Chairman, Exam Committee -->
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">Name of Chairman</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($teachers as $teacher)
                                          <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">Designation</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($designations as $designation)
                                          <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label for="">Discipline</label>
                                    <select class="form-control" name="" id="">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($disciplines as $discipline)
                                          <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                           </div>

                           <!-- Question Preparation and Answer Script Examination -->
                           <div class="form-group">
                              <label for="">Remuneration Category</label>
                              <select class="form-control" name="" id="">
                                 <option value="" selected disabled>Choose</option>
                                 @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                 @endforeach
                              </select>
                           </div>

                           <table class="table table-bordered table-striped" id="user_table">
                               <thead>
                                   <tr>
                                       <th>Course</th>
                                       <th>Name of Examiners</th>
                                       <th>No of Questions</th>
                                       <th>No of Scripts</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
               
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td colspan="5" align="right">&nbsp;</td>
                                   @csrf
                                   <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                   </td>
                                   </tr>
                               </tfoot>
                           </table>
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

@section('script')
<script>
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   
   $(document).ready(function(){
   
    var count = 1;
   
    dynamic_field(count);
   
    function dynamic_field(number)
    {
     html = '<tr>';
           html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
           html += '<td><input type="text" name="last_name[]" class="form-control" /></td>'; 
           html += '<td><input type="text" name="last_name[]" class="form-control" /></td>'; 
           html += '<td><input type="text" name="last_name[]" class="form-control" /></td>'; 
           if(number > 1)
           {
               html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
               $('tbody').append(html);
           }
           else
           {   
               html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
               $('tbody').html(html);
           }
    }
   
    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });
   
    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });
   
    
   
   });
   </script>
   
@endsection