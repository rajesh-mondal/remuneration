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
                                                <label for="exampleInputEmail1">Old Password</label>
                                                <input type="password" class="form-control" name="old_password"
                                                    id="exampleInputEmail1" placeholder="Enter Old Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">New Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" id="exampleInputPassword2"
                                                    placeholder="Enter New Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword3">Confirm New Password</label>
                                                <input type="password" class="form-control" name="password_confirmation"
                                                    id="exampleInputPassword3" placeholder="Re-enter New Password">
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
