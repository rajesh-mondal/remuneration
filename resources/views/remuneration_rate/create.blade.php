@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
   <div class="col-md-l2 col-lg-6">
      <div class="white_shd full">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Add New Remuneration Rate</h2>
            </div>
         </div>
         <div class="full graph_revenue">
            <div class="row">
               <div class="col-md-12">
                  <div class="content p-5">
                     
                     <div class="form">
                        
                        <form action="{{ route('remuneration-rate.store')}}" method="post">
                           @csrf
                           <div class="form-group">
                              <label>Remuneration Category</label>
                              <select id="inputState" name="category_id" id="category_id" class="form-control">
                                 <option selected value="" disabled>Choose...</option>
                                 @foreach($remuneration_categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endforeach
                              </select>
                              @if($errors->has('category_id'))
                              <small style="color:red">{{ $errors->first('category_id') }}</small>
                              @endif
                           </div>

                           <div class="form-group">
                              <label>Title</label>
                              <textarea name="title" id="title" cols="30" rows="10" class="form-control"></textarea>
                              @if($errors->has('title'))
                              <small style="color:red">{{ $errors->first('title') }}</small>
                              @endif
                           </div>


                           <div class="form-group">
                              <label>Amount</label>
                              <input type="text" name="amount" id="amount" class="form-control">
                              @if($errors->has('amount'))
                              <small style="color:red">{{ $errors->first('amount') }}</small>
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