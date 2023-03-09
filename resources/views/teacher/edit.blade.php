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
                        <form action="{{ route('teacher.update', $teacher->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                           <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}">
                              @if($errors->has('name'))
                              <small style="color:red">{{ $errors->first('name') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Designation</label>
                              <select id="inputState" name="designation_id" id="designation_id" class="form-control" value="{{ $teacher->designation_id }}">
                                 <option selected>Choose...</option>                                
                                 @foreach($designations as $designation)
                                 <option value="{{$designation->id}}" {{ $designation->id == $teacher->designation_id ? 'selected': ''}}>{{$designation->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('designation_id'))
                              <small style="color:red">{{ $errors->first('designation_id') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Department</label>
                              <select id="inputState" name="descipline_id" id="descipline_id" class="form-control" value="{{ $teacher->descipline_id }}">
                                 <option selected>Choose...</option>
                                 @foreach($disciplines as $displine)
                                 <option value="{{$displine->id}}" {{ $displine->id == $teacher->descipline_id ? 'selected': ''}}>{{$displine->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('descipline_id'))
                              <small style="color:red">{{ $errors->first('descipline_id') }}</small>
                              @endif
                           </div>
                           <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" id="address" class="form-control" value="{{ $teacher->address }}">
                              @if($errors->has('address'))
                              <small style="color:red">{{ $errors->first('address') }}</small>
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