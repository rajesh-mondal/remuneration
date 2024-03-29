@extends('layouts.app')

@section('content')
    <!-- graph -->
    <div class="row column2 graph margin_bottom_30">
        <div class="col-md-l2 col-lg-6">
            <div class="white_shd full">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>{{ __('Profile') }}</h2>
                    </div>
                </div>
                <div class="full graph_revenue">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content p-5">
                                {{-- <div class="mb-4">
                                    @if ($user->image)
                                        <img src="{{ asset('assets/images/profile' . $user->image) }}" alt="User Image" class="img-fluid rounded-circle shadow-lg" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <img src="{{ asset('assets/images/profile/default-avatar.jpg') }}" alt="Default Image" class="img-fluid rounded-circle shadow-lg" style="max-width: 150px; max-height: 150px;">
                                    @endif
                                </div> --}}

                                <div class="mb-4">
                                    <!-- Profile Information -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ __('Profile Information') }}</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>{{ __('Name') }}:</strong> {{ $user->name }}</li>
                                                <li class="list-group-item"><strong>{{ __('Email') }}:</strong> {{ $user->email }}</li>
                                                <li class="list-group-item"><strong>{{ __('Phone') }}:</strong> {{ $user->phone }}</li>
                                                <li class="list-group-item"><strong>{{ __('Address') }}:</strong> {{ $user->address }}</li>
                                                
                                                @if ($user->designation)
                                                    <li class="list-group-item"><strong>{{ __('Designation') }}:</strong> {{ $user->designation->name }}</li>
                                                @endif
                                                @if ($user->discipline)
                                                    <li class="list-group-item"><strong>{{ __('Discipline') }}:</strong> {{ $user->discipline->name }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Profile Button -->
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ __('Edit Profile') }}</a>

                                <!-- Change Password Button -->
                                <a href="{{ route('setting') }}" class="btn cur-p btn-warning"><i class="fa fa-key"></i> {{ __('Change Password') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
