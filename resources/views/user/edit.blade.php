@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Update User</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">                     
                     <div class="form">                        
                        <form action="{{ route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                              @if($errors->has('name'))
                                 <small style="color:red">{{ $errors->first('name') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Email</label>
                              <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                              @if($errors->has('email'))
                                 <small style="color:red">{{ $errors->first('email') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Phone</label>
                              <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                              @if($errors->has('phone'))
                                 <small style="color:red">{{ $errors->first('phone') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Account No.</label>
                              <input type="text" name="account" id="account" class="form-control" value="{{ $user->account }}">
                              @if($errors->has('account'))
                                 <small style="color:red">{{ $errors->first('account') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                              @if($errors->has('address'))
                                 <small style="color:red">{{ $errors->first('address') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Designation</label>
                              <select name="designation_id" id="designation_id" class="form-control" value="{{ $user->designation_id }}">
                                 <option selected value="" disabled>Choose...</option>
                                 @foreach($designations as $designation)
                                    <option value="{{$designation->id}}" {{ $designation->id == $user->designation_id ? 'selected': ''}}>{{$designation->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('designation_id'))
                                 <small style="color:red">{{ $errors->first('designation_id') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Discipline</label>
                              <select name="descipline_id" id="descipline_id" class="form-control" value="{{ $user->descipline_id }}">
                                 <option selected value="" disabled>Choose...</option>
                                 @foreach($disciplines as $discipline)
                                    <option value="{{$discipline->id}}" {{ $discipline->id == $user->descipline_id ? 'selected': ''}}>{{$discipline->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('descipline_id'))
                                 <small style="color:red">{{ $errors->first('descipline_id') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Role</label>
                              <select name="role_id" id="role_id" class="form-control" value="{{ $user->role_id }}">
                                 <option selected value="" disabled>Choose...</option>
                                 @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{ $role->id == $user->role_id ? 'selected': ''}}>{{$role->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('role_id'))
                                 <small style="color:red">{{ $errors->first('role_id') }}</small>
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