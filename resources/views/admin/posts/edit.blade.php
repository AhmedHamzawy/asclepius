@extends('admin.layouts.gen')
@section('title', 'Edit Post')



@section('content')


<!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="well well bs-component">
                    <!-- Form  -->
                    <form class="form-horizontal" data-toggle="validator" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Title -->            
                            <legend>Edit A Post {!! $post->title !!}</legend>
                            <div class="form-group has-feedback">
                                <input type="text" name="url" value="{!! $post->url !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" 
                                placeholder="Url"
                                data-error="Please enter Url." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="title" value="{!! $post->title !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Title" data-error="Please enter Title." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="description" value="{!! $post->description !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Description" data-error="Please enter Description." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea rows="10" name="content" pattern="[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*" class="form-control" placeholder="Content" data-error="Please enter Content." required>{!! $post->content !!}</textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="blog">
                                <option selected disabled>Blog</option>
                                <option value="1" {{ $post->blog === 1 ? 'selected' : '' }}>yes</option>
                                <option value="0" {{ $post->blog === 0 ? 'selected' : '' }}>no</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="date" name="date" value="{!! $post->date !!}" placeholder="date" class="form-control" data-error="Please enter date." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" accept="image/*" class="form-control" />
                            </div>

                            <div class="form-group addition">
                                      
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default"><a href="{{ URL::asset('admin/posts') }}">Cancel</a></button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection




 