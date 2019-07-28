@extends('admin.layouts.gen')
@section('title', 'The Rooms')



@section('content')



<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! action('RoomsController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                        <h2> Rooms </h2>
                    </div>
                    @if ($rooms->isEmpty())
                        <p> There is no room.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No</th>
                                    <th>Floor</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                    <tr>
                                        <td>{!! $room->id !!}</td>
                                        <td>{!! $room->no !!}</td>
                                        <td>{!! $room->floor !!}</td>
                                        <td>{!! $room->department->name  !!}</td>
                                        <td><a href="{!! action('RoomsController@edit', $room->id) !!}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <td> <form method="post" action="{!! action('RoomsController@destroy', $room->id) !!}">
                                         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                                    </div>
                                                </div>
                                        </form></td>
                            



                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    @endif
                    <div class="text-center"> 
                        {!! $rooms->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



