@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <div class="card my-4">
        <h4 class="card-header">
            Edit user
        </h4>
        <div class="card-body">
            <form method="POST" action="/admin/user/update/{{$user->id}}">
                @csrf
                <div class="form-row">
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Username</label>
                            <input class="form-control py-4" name="input_username" id="inputUsername" type="text" placeholder="Enter username" value="{{$user->username}}" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Password</label>
                            <input class="form-control py-4" name="input_password" id="inputPassword" type="text" placeholder="Enter password" value="" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputName">Full name</label>
                            <input class="form-control py-4" name="input_name" id="inputName" type="text" placeholder="Enter full name" value="{{$user->name}}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputName">Email</label>
                            <input class="form-control py-4" name="input_email" id="inputEmail" type="text" placeholder="Enter email" value="{{$user->email}}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="cb_publish_user" type="checkbox" name="cb_publish_user" {{( $user->status == 1 ) ? "checked" : ""}} />
                        <label class="custom-control-label" for="cb_publish_user" >Publish</label>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" value="Update User" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>

</div>
@stop
@section('admin-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
    if ( typeof CKEDITOR !== 'undefined' ) {
        CKEDITOR.disableAutoInline = true;
        var editor = CKEDITOR.replace( 'txta_content' );
        CKFinder.setupCKEditor( editor );
    } 
</script>
@stop