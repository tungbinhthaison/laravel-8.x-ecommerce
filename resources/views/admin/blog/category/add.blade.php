@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <div class="card my-4">
        <h4 class="card-header">
            Add category
        </h4>
        <div class="card-body">
            <form method="POST" action="/admin/blog/category/store">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Parent</label>
                            <select class="custom-select" name="select_category" id="selectCategory">
                                <option selected value="0">Select parent</option>
                                @if( !empty($listCategory) )
                                    @foreach($listCategory as $key => $value)
                                        <option value="{{$value->id}}">{{$value->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Title</label>
                            <input class="form-control py-4" name="input_title" id="inputTitle" type="text" placeholder="Enter first name" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputSlug">Slug</label>
                            <input class="form-control py-4" name="input_slug" id="inputSlug" type="text" placeholder="Enter last name" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="txta_content" id="txtaContent" cols="30" rows="10" tabindex="3" >{{old('txta_content')}}</textarea>
                            @error('txta_content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" value="Create Account" class="btn btn-primary"/>
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