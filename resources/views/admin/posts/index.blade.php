@extends('admin.layouts.gen')
@section('title', 'The Posts')



@section('content')


<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{!! action('PostsController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                            <h2> Posts </h2>
                        </div>
                        @if ($posts->isEmpty())
                        <p> There is no post.</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>URL</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{!! $post->id !!}</td>
                                    <td>{!! $post->url !!}</td>
                                    <td>{!! $post->title !!}</td>
                                    <td><a href="{!! action('PostsController@edit', $post->id) !!}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <td> <form method="post" action="{!! action('PostsController@destroy', $post->id) !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                    </div>
                                    </form>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach 
                            </tbody>
                        </table>
                        @endif
                        <div class="text-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection