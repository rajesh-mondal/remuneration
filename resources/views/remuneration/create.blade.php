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
               <div class="col-lg-12">
                  <div class="content p-5">

                     <div class="form">
                        <form method="post" id="dynamic_form" action="{{ route('remuneration.store') }}">
                           @csrf
                           <div class="form-row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Discipline</label>
                                    <select class="form-control" name="discipline_id" id="discipline_id">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($disciplines as $discipline)
                                       <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Exam</label>
                                    <select class="form-control" name="exam_id" id="exam_id">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($exams as $exam)
                                       <option value="{{ $exam->id }}">{{ $exam->year['year'] }} Year - {{ $exam->term['term'] }} Term - {{ $exam->session['session'] }} Session</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Remuneration Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($categories as $category)
                                       <option value="{{ $category->id }}">{{ $category->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Remuneration Rate</label>
                                    <select class="form-control" name="rate_id" id="rate_id">
                                       <option value="" selected disabled>Choose</option>

                                    </select>
                                 </div>
                              </div>

                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label for="">Number Type</label>
                                    <select class="form-control" name="type_id" id="type_id">
                                       <option value="" selected disabled>Choose</option>
                                       @foreach ($types as $type)
                                       <option value="{{ $type->id }}">{{ $type->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>


                           </div>



                           <!-- Question Preparation and Answer Script Examination -->
                           <div class="mt-4 text-right mb-2">
                              <button type="button" name="add" id="add" class="btn btn-success">Add Field</button>
                           </div>
                           <table class="table table-bordered table-striped " id="user_table">
                              <thead>
                                 <tr>
                                    <th style="width: 20%;">Course</th>
                                    <th style="width: 20%;">Name of Teacher</th>
                                    <th style="width: 15%;">Number</th>
                                    <th style="width: 15%;">Student (If*)</th>
                                    <th style="width: 15%;">Halp/Full paper</th>
                                    <th style="width: 10%;">Action</th>
                                 </tr>
                              </thead>
                              <tbody>

                              </tbody>

                           </table>
                           <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                           <input type="submit" name="save_another" id="save_another" class="btn btn-primary" value="Save and Add another" />


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

   $(document).ready(function() {

      var count = 0;

      dynamic_field(count);

      function dynamic_field(number) {
         html = '<tr>';
         html += '<td><select class="form-control course" name="course[]" id="course_' + number + '"><option value="" selected="" disabled> -- select course --</option></select></td>';
         html += '<td><select class="form-control teacher" name="teacher[]" id="teacher_' + number + '"><option value="" selected="" disabled> -- select teacher --</option></select></td>';
         html += '<td><input type="number" min="1" name="number[]" class="form-control" /></td>';
         html += '<td><input type="number" min="1" name="student[]" class="form-control" /></td>';
         html += '<td><select class="form-control" name="paper[]"><option value="half">Half Paper</option><option value="full">Full Paper</option></select></td></td>';
         if (number > 0) {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
         }
      }

      $(document).on('click', '#add', function() {
         count++;
         dynamic_field(count);
         console.log(count)

         $.ajax({
            url: "{{ route('get.course') }}",
            dataType: "json",
            success: function(html) {
               $('#course_' + count).append(html.data);
            }
         });

         $.ajax({
            url: "{{ route('get.teacher') }}",
            dataType: "json",
            success: function(html) {
               $('#teacher_' + count).append(html.data);
            }
         })
      });

      $(document).on('click', '.remove', function() {
         count--;
         $(this).closest("tr").remove();
      });




      $(document).on('change', '#category_id', function() {
         var id = $(this).val();

         $('#rate_id').html('');
         $.ajax({
            url: "/get-rate/" + id,
            dataType: "json",
            success: function(html) {
               $('#rate_id').append(html.data);
            }
         })
      });



   });
</script>

@endsection