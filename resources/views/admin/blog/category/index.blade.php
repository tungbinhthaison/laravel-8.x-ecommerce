@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <div class="card my-4">
        <h4 class="card-header">
            Category
        </h4>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="listCategory" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Parent</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Category Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Category Delete</h4>
                    <button type="button" class="cancel-delete btn btn-default" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <h4>Are you sure want to delete this Category?</h4>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn base-bg-yellow text-white" id="submitDeleteCategory">Yes</button>
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

        var editor = $('#listCategory').DataTable({
            responsive: true,
            processing: false,
            serverSide: true,
            ajax: '/admin/blog/category/get-list-datatable',
            columns: [
                {
                    data: 'title'
                },
                {
                    data: 'parent_id'
                },
                {
                    data: 'slug'
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
            window.location.href = "/admin/blog/category/edit/" + _editID;
        })

        // Delete Category Ajax request.

        var _deleteID;
        $('body').on('click', '.btn-delete', function(){
            $('#deleteModal').show();
            _deleteID = $(this).data('id');
        })

        $('#submitDeleteCategory').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/blog/category/delete/" + _deleteID,
                method: 'DELETE',
                success: function(result) {
                    setInterval(function(){ 
                        $('#listCategory').DataTable().ajax.reload();
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