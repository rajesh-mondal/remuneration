@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
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
                     
                     <div class="form">
                        
                        <form action="{{ route('course.update', $course->id)}}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                              <label>Course</label>
                              <input type="text" name="course" id="course" class="form-control" value="{{ $course->course }}">
                              @if($errors->has('course'))
                              <small style="color:red">{{ $errors->first('course') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Discipline</label>
                              <select name="descipline_id" id="descipline_id" class="form-control" value="{{ $course->descipline_id }}">
                                 <option selected>Choose...</option>
                                 @foreach($disciplines as $displine)
                                <option value="{{$displine->id}}" {{ $displine->id == $course->descipline_id ? 'selected': ''}}>{{$displine->name}}</option>
                                 @endforeach
                              </select>
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