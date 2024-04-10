@extends('layouts.app')

@section('content')
<!-- graph -->
<div class="row column2 graph margin_bottom_30">
    <div class="col-md-12">
        <a href="{{ route('remuneration.index') }}" class="btn btn-primary mb-3">Go Back</a>
        <div class="white_shd full">
            <div class="full graph_head">
                <div class="heading1 margin_0 d-flex justify-content-between w-100">
                    <h2>Remuneration List</h2>

                    <form action="{{ route('remuneration.pdf') }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                        <input type="hidden" name="discipline_id" value="{{ $discipline->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-success">View Pdf</button>
                    </form>
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
                            <form action="{{ route('remuneration.approve') }}" method="post">
                                @csrf
                                <input type="hidden" name="discipline" value="{{ $discipline->id }}">
                                <input type="hidden" name="user" value="{{ $user->id }}">
                                <div class="table-resposive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Remuneration</td>
                                                <td>Course Code</td>
                                                <td>Details</td>
                                                <td>Rate</td>
                                                <td>No. of ()</td>
                                                <td>No. of Student</td>
                                                <td>Paper</td>
                                                <td>Amount</td>
                                                {{-- <td>Feedback</td> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $grand_total = 0;
                                            @endphp
                                            @foreach ($rems as $rem)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    @if($rem->category)
                                                        {{ $rem->category['name'] }}
                                                    @endif
                                                </td>
                                                <td>{{ $rem->course->course }}</td>
                                                <td>
                                                    @if($rem->rate)
                                                        {{ $rem->rate['title'] }} 
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($rem->rate)
                                                        {{ $rem->rate['amount'] }} 
                                                    @endif
                                                </td>
                                                <td>{{ $rem->number }} ({{ $rem->type['name'] }})</td>
                                                <td>{{ $rem->students }}</td>
                                                <td>{{ $rem->paper }}</td>
                                                <td>
                                                    @php
                                                    if ($rem->paper == 'half') {
                                                    $amount = $rem->rate['amount'] / 2;
                                                    } else {
                                                    $amount = $rem->rate['amount'];
                                                    }

                                                    if ($rem->number && $rem->students) {
                                                    $total = $amount * $rem->number * $rem->students;
                                                    } elseif ($rem->number != null) {
                                                    $total = $amount * $rem->number;
                                                    } elseif ($rem->students != null) {
                                                    $total = $amount * $rem->students;
                                                    }

                                                    $grand_total = $grand_total + $total;

                                                    @endphp


                                                    {{ $total }}

                                                </td>
                                                {{-- <td>
                                                    <input type="hidden" name="id[]" value="{{ $rem->id }}">
                                                    <textarea name="feedback[]" id="" class="form-control"></textarea>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <button type="submit" class="btn btn-success">Approve</button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end graph -->
@endsection