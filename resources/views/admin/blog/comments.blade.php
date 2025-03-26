@extends('admin.layouts.admin')

@section('content')

<section class="content" id="contentContainer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #fdf3ee">
                    <div class="card-header">
                        <h3 class="card-title">All Blogs</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>User Details</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $comment->name }} <br>
                                        {{ $comment->email }}
                                    </td>
                                    <td>{!! $comment->comment !!}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input toggle-status" id="customSwitchStatus{{ $comment->id }}" data-id="{{ $comment->id }}" {{ $comment->status == 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitchStatus{{ $comment->id }}"></label>
                                        </div>
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
</section>

@endsection

@section('script')

<script>
    $(document).ready(function() {

        $(document).on('change', '.toggle-status', function() {
            var commentId = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/comment-status/' + commentId + '/status',
                method: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status === 200) {
                        showSuccess(response.message);
                    } else {
                        showError('Failed to update status.');
                    }
                },
                error: function(xhr, status, error) {
                    showError('An error occurred. Please try again.');
                }
            });
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    });
</script>
@endsection