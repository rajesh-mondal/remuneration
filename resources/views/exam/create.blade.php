@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Add New Exam</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     
                     <div class="form">
                        <form action="{{ route('exam.store')}}" method="POST">
                           @csrf
                           <div class="form-group">
                              <label>Year</label>
                              <select id="inputState" name="year_id" id="year_id" class="form-control">
                                 <option selected value="" disabled>Choose...</option>                                
                                 @foreach($years as $year)
                                 <option value="{{$year->id}}">{{$year->year}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('year_id'))
                              <small style="color:red">{{ $errors->first('year_id') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Term</label>
                              <select id="inputState" name="term_id" id="term_id" class="form-control">
                                 <option selected value="" disabled>Choose...</option>                                
                                 @foreach($terms as $term)
                                 <option value="{{$term->id}}">{{$term->term}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('term_id'))
                              <small style="color:red">{{ $errors->first('term_id') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Session</label>
                              <select id="inputState" name="session_id" id="session_id" class="form-control">
                                 <option selected value="" disabled>Choose...</option>                                
                                 @foreach($sessions as $session)
                                 <option value="{{$session->id}}">{{$session->session}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('session_id'))
                              <small style="color:red">{{ $errors->first('session_id') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Start Date</label>
                              <input type="date" name="start_date" id="start_date" class="form-control">
                              @if($errors->has('start_date'))
                              <small style="color:red">{{ $errors->first('start_date') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>End Date</label>
                              <input type="date" name="end_date" id="end_date" class="form-control">
                              @if($errors->has('end_date'))
                              <small style="color:red">{{ $errors->first('end_date') }}</small>
                              @endif
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