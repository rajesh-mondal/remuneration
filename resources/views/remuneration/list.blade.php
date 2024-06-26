@extends('layouts.app')

@section('content')

{{-- <div class="row column2 graph margin_bottom_30">
   <div class="col-lg-12">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="white_shd full">
               <div class="full graph_head">
                  <div class="heading1 margin_0 d-flex justify-content-between w-100">
                     <h2>Filter Remuneration</h2>
                  </div>
               </div>
               <div class="full graph_revenue">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="content p-5">


                           <div class="filter-form">
                              <form action="{{ route('remuneration.search') }}" method="post">
                                 @csrf
                                 <div class="form-group">
                                    <label for="">Exam</label>
                                    <select name="exam_id" id="exam_id" class="form-control">
                                       <option value="" selected disabled>-- select exam --</option>
                                       @foreach($exams as $exam)
                                       <option value="{{ $exam->id }}">{{ $exam->year['year'] }} year - {{ $exam->term['term'] }} Term (Session: {{ $exam->session['session'] }})</option>
                                       @endforeach
                                    </select>
                                 </div>

                                 <div class="form-group">
                                    <label for="">Discipline</label>
                                    <select name="discipline_id" id="discipline_id" class="form-control">
                                       <option value="" selected disabled>-- select discipline --</option>
                                       @foreach($disciplines as $discipline)
                                       <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>

                                 <div class="form-group">
                                    <label for="">User</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                       <option value="" selected disabled>-- select user --</option>
                                       @foreach($users as $user)
                                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                                       @endforeach
                                    </select>
                                 </div>

                                 <button class="btn btn-primary" type="submit">Search</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> --}}

<div class="row column2 graph margin_bottom_30">
   <div class="col-md-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0 d-flex justify-content-between w-100">
               <h2>Remuneration List</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     <div class="table-responsive">
                        <table class="table table-bordered w-100" id="rate_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Teacher</th>
                                 <th>Course Code</th>
                                 <th>Discipline</th>
                                 <th>Exam</th>
                                 <th>Category</th>
                                 <th>Rate</th>
                                 <th>No of (*)</th>
                                 <th>Paper</th>
                                 <th>Amount</th>
                                 <th>Status</th>
                                 @if($user->is_admin || ($user->role && $user->role['name'] == 'Admin'))
                                    <th>Action</th>
                                 @endif
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="delete_form" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
               <h4 class="text-center">Do you want to delete?</h4>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Delete</button>
         </form>
      </div>
   </div>
</div>
</div>
<!-- delete modal end -->
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#rate_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('remuneration.newlist') }}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'teacher', name: 'teacher' },
            { data: 'course_code', name: 'course_code' },
            { data: 'discipline', name: 'discipline' },
            { data: 'exam', name: 'exam' },
            { data: 'category', name: 'category' },
            { data: 'rate', name: 'rate' },
            { data: 'number', name: 'number' },
            { data: 'rempaper', name: 'rempaper' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' },
            @if($user->is_admin || ($user->role && $user->role['name'] == 'Admin'))
            {
               data: 'action',
               name: 'action',
               orderable: false
            }
            @endif
        ],
        initComplete: function(settings, json) {
            console.log(json); // Output the JSON data to the console for debugging
        }
    });
});

$(document).on('click', '.delete', function() {
   $('#delete_modal').modal('show');
   var route = $(this).attr('route');
   $('#delete_form').attr('action', route);
});

</script>

@endsection
{{-- @section('script')
<script>
$(document).ready(function() {
    $('#rate_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('remuneration.newlist') }}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'teacher', name: 'teacher' },
            { data: 'discipline', name: 'discipline' },
            { data: 'exam', name: 'exam' },
            { data: 'category', name: 'category' },
            { data: 'rate', name: 'rate' },
            { data: 'number', name: 'number' },
            { data: 'rempaper', name: 'rempaper' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' },
        ],
        initComplete: function(settings, json) {
            console.log(json); // Output the JSON data to the console for debugging
        }
    });
});
</script>
@endsection --}}