@extends('admin.layouts.gen')
@section('title', 'The Users')



@section('content')



<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! action('UsersController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                        <h2> Users </h2>
                    </div>
                    @if ($users->isEmpty())
                    <p> There is no user.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                        @if($user->role == 'Admin')

                            @can('admin-access')

                            <td>{!! $user->id !!}</td>
                            <td>{!! $user->firstname !!}&nbsp;{!! $user->lastname !!}</td>
                            <td>{!! $user->telephone !!}</td>
                            <td>{!! $user->email !!}</td>

                            @endcan
                        @else    
                        <td>{!! $user->id !!}</td>
                        <td>{!! $user->firstname !!}&nbsp;{!! $user->lastname !!}</td>
                        <td>{!! $user->telephone !!}</td>
                        <td>{!! $user->email !!}</td>


                        <td><a href="{!! action('UsersController@edit', $user->id) !!}" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                        <td> <form method="post" action="{!! action('UsersController@destroy', $user->id) !!}">
                         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button>
                                    </div>
                                </div>
                        </form></td>
                        </td>

                        </tr>
                        @endif
                        @endforeach 
                        </tbody>
                    </table>
                    @endif
                    <div class="text-center"> 
                        {!! $users->links() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection