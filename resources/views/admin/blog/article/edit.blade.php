@extends('admin.master')
@section('admin-content')
<div class="container-fluid">
    <h31 class="my-4">Blog Article</h3>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Edit new
        </div>
        <div class="card-body">
            <form method="POST" action="/admin/blog/article/update/{{$article->id}}">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Category</label>
                            <select class="custom-select" name="select_category" id="selectCategory">
                                <option selected>Open this select menu</option>
                                @if( !empty($listCategory) )
                                    @foreach($listCategory as $key => $value)
                                        <option value="{{$value->id}}" {{($value->id == $article->category_id) ? "selected" : ""}}>{{$value->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1">Title</label>
                            <input class="form-control py-4" name="input_title" id="inputTitle" type="text" placeholder="Enter first name" value="{{$article->title}}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="small mb-1" for="inputShortContent">Short content</label>
                            <input class="form-control py-4" name="input_short_content" id="inputShortContent" type="text" placeholder="Enter last name" value="{{$article->short_content}}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="txta_content" id="txtaContent" cols="30" rows="10" tabindex="3" >{{$article->content}}</textarea>
                            @error('txta_content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="cb_publish_password" type="checkbox" name="cb_publish_password" {{($article->published)?"checked":""}} />
                                <label class="custom-control-label" for="cb_publish_password" >Publish</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 mb-0">
                    <input type="submit" value="Update Article" class="btn btn-primary"/>
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