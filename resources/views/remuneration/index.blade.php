@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0 d-flex justify-content-between w-100">
               <h2>Remuneration List</h2> <a href="{{ route('remuneration.create')}}" class="btn btn-info mb-3">Add New Remuneration</a>
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
<!-- end graph -->


@endsection


@section('script')
<script>
  
</script>
@endsection