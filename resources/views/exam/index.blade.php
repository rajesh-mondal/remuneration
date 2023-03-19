@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-12">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>All Exams</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     <a href="{{ route('exam.create')}}" class="btn btn-success mb-3">Add Exam</a>
                     <div class="table-responsive">
                        <table class="table table-bordered w-100" id="exam_table">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Year</th>
                                 <th>Term</th>
                                 <th>Session</th>
                                 <th>Action</th>
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
<!-- end graph -->

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
$(document).ready(function(){

   $('#exam_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
      url: "{{ route('exam.index') }}",
      },
      columns: [
      {
      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      orderable: false,
      searchable: false,
      },
      {
      data: 'year',
      name: 'year'
      },
      {
      data: 'term',
      name: 'term'
      },
      {
      data: 'session',
      name: 'session'
      },
      {
      data: 'action',
      name: 'action',
      orderable: false
      }
      ]
   })
})

$(document).on('click', '.delete', function () {
    $('#delete_modal').modal('show');
    var route = $(this).attr('route');
    $('#delete_form').attr('action', route);
});

</script>
@endsection