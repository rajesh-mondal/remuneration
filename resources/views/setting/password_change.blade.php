@extends('layouts.app')

@section('content')
<div class="row column2 graph margin_bottom_30">
    <div class="col-md-l2 col-lg-6">
        <div class="white_shd full">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Update Password</h2>
                </div>
            </div>
            <div class="full graph_revenue">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content p-5">
                            <div class="form">
                                <form role="form" action="{{ route('password.update') }}" method="Post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                                            @if($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                            @endif
                                            @if(Session::has('error'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ Session::get('error') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">New Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword2" placeholder="Enter New Password">

                                            @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm New Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Re-enter New Password">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
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
@endsection