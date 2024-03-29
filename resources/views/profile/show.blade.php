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
                                <p>{{ __('Name') }}: {{ $user->name }}</p>
                                <p>{{ __('Email') }}: {{ $user->email }}</p>
                                <p>{{ __('Phone') }}: {{ $user->phone }}</p>
                                <p>{{ __('Address') }}: {{ $user->address }}</p>

                                @if ($user->designation)
                                    <p>{{ __('Designation') }}: {{ $user->designation->name }}</p>
                                @endif

                                @if ($user->discipline)
                                    <p>{{ __('Discipline') }}: {{ $user->discipline->name }}</p>
                                @endif

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
