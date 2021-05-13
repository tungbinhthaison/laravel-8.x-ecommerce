@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <h1 class="mt-4">Tables</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="category-datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Parent</th>
                            <th>Content</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('admin-script')
<script>
    $(document).ready(function() {
        // Initial datatable for list category
        $('#category-datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '/api/blog/category/get-list',
            columns: [
                {
                    data: 'title'
                },
                {
                    data: 'parent_id'
                },
                {
                    data: 'content'
                },
                {
                    data: 'slug'
                }
            ]
        });
    });
</script>
@stop