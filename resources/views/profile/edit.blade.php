@extends('layouts.app')

@section('content')
    <!-- graph -->
    <div class="row column2 graph margin_bottom_30">
        <div class="col-md-l2 col-lg-6">
            <div class="white_shd full">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>Update Profile</h2>
                    </div>
                </div>
                <div class="full graph_revenue">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content p-5">
                                <div class="form">
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ old('name', $user->name) }}" required autocomplete="name"
                                                autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">{{ __('Phone') }}</label>
                                            <input id="phone" type="text" class="form-control" name="phone"
                                                value="{{ old('phone', $user->phone) }}" required autocomplete="phone">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">{{ __('Address') }}</label>
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ old('address', $user->address) }}" autocomplete="address">
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Designation') }}</label>
                                            <select name="designation_id" id="designation_id" class="form-control">
                                                <option selected disabled>{{ __('Choose...') }}</option>
                                                @foreach ($designations as $designation)
                                                    <option value="{{ $designation->id }}"
                                                        {{ $designation->id == $user->designation_id ? 'selected' : '' }}>
                                                        {{ $designation->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('designation_id')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Discipline') }}</label>
                                            <select name="descipline_id" id="descipline_id" class="form-control">
                                                <option selected disabled>{{ __('Choose...') }}</option>
                                                @foreach ($disciplines as $discipline)
                                                    <option value="{{ $discipline->id }}"
                                                        {{ $discipline->id == $user->descipline_id ? 'selected' : '' }}>
                                                        {{ $discipline->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('descipline_id')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
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
