@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <div class="card my-4">
        <div class="card-header">
            <h4>Article</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="listArticle" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Nội dung ngắn</th>
                            <th>Tác giả</th>
                            <th>Xuất bản</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Article Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Article Delete</h4>
                    <button type="button" class="cancel-delete" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Are you sure want to delete this Article?</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn base-bg-yellow text-white" id="submitDeleteArticle">Yes</button>
                    <button type="button" class="btn btn-default cancel-delete" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('admin-script')
<script>
    $(document).ready(function() {
        $('#listArticle').DataTable({
            responsive: true,
            processing: false,
            serverSide: true,
            ajax: '/admin/blog/article/get-list-datatable',
            columns: [
                {
                    data: 'title'
                },
                {
                    data: 'short_content'
                },
                {
                    data: 'author_name'
                },
                {
                    render: function (data, type, row) {
                        return row["published"] == 1 ? "Đã xuất bản" : "Chưa xuất bản";
                    }
                },
                {
                    data: 'Actions'
                }
            ]
        });

        // Edit
        var _editID;
        $('body').on('click', '.btn-edit', function(){
            _editID = $(this).data('id');
            window.location.href = "/admin/blog/article/edit/" + _editID;
        })

        // Delete Article Ajax request.

        var _deleteID;
        $('body').on('click', '.btn-delete', function(){
            $('#deleteModal').show();
            _deleteID = $(this).data('id');
        })

        $('#submitDeleteArticle').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/blog/article/delete/" + _deleteID,
                method: 'DELETE',
                success: function(result) {
                    console.log(result);
                    setInterval(function(){ 
                        $('#listArticle').DataTable().ajax.reload();
                        $('#deleteModal').hide();
                    }, 1000);
                }
            });
        });

        $('.cancel-delete').on('click', function(){
            $('#deleteModal').hide();
        });
    });
</script>
@stop