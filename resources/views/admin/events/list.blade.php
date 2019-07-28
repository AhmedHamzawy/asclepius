@extends('admin.layouts.gen')
@section('title', 'The Events')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2> Events </h2>
                        </div>
                        @if ($events->isEmpty())
                             <p> There is no post.</p>
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>url</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{!! $event->id !!}</td>
                                <td>{!! $event->title !!}</td>
                                <td>{!! $event->url !!}</td>
                                <td><a href="{!! action('EventsController@edit', $event->id) !!}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                <td> <form method="post" action="{!! action('EventsController@destroy', $event->id) !!}">
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
                            {!! $events->links() !!}
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection