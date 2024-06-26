@extends('layouts.app')

@section('content')
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
                            <button type="submit" class="btn btn-outline-success">Generate PDF</button>
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
                                <div class="table-resposive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Remuneration</td>
                                                <td>Course Code</td>
                                                <td>Details</td>
                                                <td>Rate</td>
                                                <td>Number of ()</td>
                                                <td>Number of Student</td>
                                                <td>Paper</td>
                                                <td>Amount</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $grand_total = 0;
                                            @endphp
                                            @foreach ($rems as $rem)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $rem->category['name'] }}</td>
                                                    <td>
                                                        @if($rem->course)
                                                            {{ $rem->course->course }}
                                                        @endif
                                                    </td>
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
                                                    <td>{{ $rem->number }} ({{ optional($rem->type)->name }})</td>
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
                                                    <td>
                                                        <a href="{{ route('remuneration.edit', $rem->id) }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        {{-- <a href="{{ route('remuneration.destroy', $rem->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> --}}
                                                        <form action="{{ route('remuneration.destroy', $rem->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
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
@endsection
