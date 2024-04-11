@extends('layouts.app')

@section('content')

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
                                 <th>Course Code</th>
                                 <th>Exam</th>
                                 <th>Category</th>
                                 <th>Details</th>
                                 <th>Rate</th>
                                 <th>No of (*)</th>
                                 <th>Paper</th>
                                 <th>Amount</th>
                                 <th>Status</th>
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
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#rate_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
         url: "{{ route('myream.myNewList') }}",
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'course_code', name: 'course_code' },
            { data: 'exam', name: 'exam' },
            { data: 'category', name: 'category' },
            { data: 'details', name: 'details' },
            { data: 'rate', name: 'rate' },
            { data: 'number', name: 'number' },
            { data: 'rempaper', name: 'rempaper' },
            { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' },
        ],
        initComplete: function(settings, json) {
            console.log(json);
        }
    });
});

</script>

@endsection