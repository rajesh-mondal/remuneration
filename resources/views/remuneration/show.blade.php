@extends('layouts.app')

@section('content')


<!-- graph -->
<div class="row column2 graph margin_bottom_30">
    <div class="col-md-12">
        <a href="{{ route('remuneration.index') }}" class="btn btn-primary mb-3">Go Back</a>
        <div class="white_shd full">
            <div class="full graph_head">
                <div class="heading1 margin_0 d-flex justify-content-between w-100">
                    <h2>Remuneration List</h2> <a href="" class="btn btn-success">Generate Pdf</a>
                </div>
            </div>
            <div class="full graph_revenue">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content p-5">
                            
                            <div class="text-center mb-5">
                                <h3>Khulna University</h3>
                                <h4>{{ $discipline->name }}</h4>
                                <h4>{{ $user->name }}</h4>
                            </div>
                            <div class="table-resposive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Remuneration</td>
                                            <td>Details</td>
                                            <td>Number of ()</td>
                                            <td>Number of Student</td>
                                            <td>Paper</td>
                                            <td>Amount</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rems as $rem)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $rem->category['name'] }}</td>
                                            <td>{{ $rem->rate['title'] }}</td>
                                            <td>{{ $rem->number }} ({{ $rem->type['name'] }})</td>
                                            <td>{{ $rem->students }}</td>
                                            <td>{{ $rem->paper }}</td>
                                            <td>
                                                @if($rem->paper == 'half')
                                                {{ $rem->rate['amount'] / 2 }}
                                                @else
                                                {{ $rem->rate['amount'] }}
                                                @endif

                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Edit</a>
                                                <a href="#" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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