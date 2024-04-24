@extends('layouts.app')

@section('content')

<div class="row column2 graph margin_bottom_30">
    <div class="col-md-l2 col-lg-12">
        <div class="white_shd full">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>All Notification</h2>
                </div>
            </div>
            <div class="full graph_revenue">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content p-5">
                            <div class="table-responsive">
                                <table class="table table-bordered w-100" id="term_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete_form" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h4 class="text-center">Do you want to delete?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- delete modal end -->

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#term_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('notification.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'data.role', name: 'data.role' },
                { data: 'data.data.feedback', name: 'data.data.feedback' },
                { 
                    data: 'status', 
                    name: 'status',
                    render: function(data) {
                        if (data === 'Read') {
                            return '<span class="badge badge-success badge-lg">' + data + '</span>';
                        } else {
                            return '<span class="badge badge-danger badge-lg">' + data + '</span>';
                        }
                    }
                },
                { data: 'action', name: 'action', orderable: false }
            ],
            "createdRow": function(row, data, dataIndex) {
                var feedback = data['data']['data']['feedback'];
                var status = data['status'];
                var messageClass = (status === 'Read') ? 'notification-message-green' : 'notification-message-red';
                $(row).find('td:nth-child(3)').html('<div class="' + messageClass + '">' + feedback + '</div>');
            }
        });
    });

    $(document).on('click', '.delete', function() {
        $('#delete_modal').modal('show');
        var route = $(this).attr('route');
        $('#delete_form').attr('action', route);
    });
</script>

<style>
    .notification-message-green {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid;
        background-color: #d4edda;
        color: #155724;
    }

    .notification-message-red {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid;
        background-color: #f8d7da;
        color: #721c24;
    }

    .badge-success {
        background-color: #28a745;
        color: #ffffff;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #ffffff;
    }

    .badge-lg {
        font-size: 12px;
        padding: 6px 12px;
    }

    body {
        color: #000000;
    }
</style>
@endsection
