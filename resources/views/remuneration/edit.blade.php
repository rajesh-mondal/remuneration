@extends('layouts.app')

@section('content')

<div class="row column2 graph margin_bottom_30">
    <div class="col-lg-12">
        <a href="{{ route('remuneration.newlist') }}" class="btn btn-primary mb-3">Go Back</a>
        <div class="white_shd full">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Edit Remuneration</h2>
                </div>
            </div>
            <div class="full graph_revenue">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="content p-5">

                            <div class="form">
                                <form method="post" action="{{ route('remuneration.update', $rem->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Discipline</label>
                                                <select class="form-control" name="discipline_id" id="discipline_id">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($disciplines as $discipline)
                                                    <option value="{{ $discipline->id }}" {{ $rem->discipline_id == $discipline->id ? 'selected' : ''}}>{{ $discipline->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Exam</label>
                                                <select class="form-control" name="exam_id" id="exam_id">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($exams as $exam)
                                                    <option value="{{ $exam->id }}" {{ $rem->exam_id == $exam->id ? 'selected' : '' }}>{{ $exam->year['year'] }} Year - {{ $exam->term['term'] }} Term - {{ $exam->session['session'] }} Session</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Remuneration Category</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $rem->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Remuneration Rate</label>
                                                <select class="form-control" name="rate_id" id="rate_id">
                                                    <option value="{{ $rate->id }}" >{{ $rate->title }} - {{ $rate->amount }}</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Number Type</label>
                                                <select class="form-control" name="type_id" id="type_id">
                                                    <option value="" selected disabled>Choose</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{ $type->id }}" {{ $rem->type_id == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Course</label>
                                                <select class="form-control course" name="course_id" id="course_id">
                                                    <option value="" selected="" disabled> -- select course --</option>
                                                    @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}" {{ $rem->course_id == $course->id ? 'selected' : ''}}>{{ $course->course }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Teacher</label>
                                                <select class="form-control teacher" name="user_id" id="user_id">
                                                    <option value="" selected="" disabled> -- select teacher --</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" {{ $rem->user_id == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Number (Question/Script/....)</label>
                                                <input type="number" min="1" name="number" id="number" class="form-control" value="{{ $rem->number }}" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Students</label>
                                                <input type="number" min="1" name="students" id="students" class="form-control" value="{{ $rem->students }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Paper (Half/Full)</label>
                                                <select class="form-control" name="paper" id="paper">
                                                    <option value="half" {{ $rem->paper == 'half' ? 'selected' : '' }}>Half Paper</option>
                                                    <option value="full" {{ $rem->paper == 'full' ? 'selected' : '' }}>Full Paper</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="save" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="saveForm" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center" style="text-transform: none;">Do you want to save this data?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#category_id', function() {
        var id = $(this).val();

        $('#rate_id').html('');
        $.ajax({
            url: "/get-rate/" + id,
            dataType: "json",
            success: function(html) {
                $('#rate_id').append(html.data);
            }
        })
    });
</script>
@endsection