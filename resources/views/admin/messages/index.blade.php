@extends('admin.layouts.gen')
@section('title', 'The Messages')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! action('MessagesController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                        <h2> Messages </h2>
                    </div>
                    @if ($messages->isEmpty())
                      <p> There is no message.</p>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>img</th>
                                <th>From</th>
                                <th>img</th>
                                <th>To</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{!! $message->id !!}</td>
                                <td><img class="img-circle" src="{{ URL::asset('images/users/'.$message->sender->id.'.jpg') }}" style="width:50px;height:50px"/></td>
                                <td>{!! $message->sender->user_name !!}</td>
                                <td><img class="img-circle" src="{{ URL::asset('images/users/'.$message->reciever->id.'.jpg') }}" style="width:50px;height:50px"/></td>
                                <td>{!! $message->reciever->user_name !!}</td>
                                <td>{!! $message->subject !!}</td>
                                <td><a href="{!! action('MessagesController@show', $message->id) !!}" class="btn btn-primary"><span class="glyphicon glyphicon-comment"></span></a></td>
                            </tr>
                        @endforeach 
                        </tbody>
                    </table>
                    @endif

                    <div class="text-center">
                     {!! $messages->links() !!}
                    </div>

                    </div>




                     <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{!! action('MessagesController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                        <h2> Messages </h2>
                    </div>
                    @if ($messages->isEmpty())
                      <p> There is no message.</p>
                    @else
                   
                        @foreach($messages as $message)
                           <li class="list-group-item">
                                <div class="alert alert-danger colorone">
                                    <a href="{!! action('MessagesController@show', $message->id) !!}"><span class="glyphicon glyphicon-info-sign"></span> <strong>Message From {!! $message->sender->firstname !!}&nbsp;
                                    {!! $message->sender->lastname !!}</strong></a>
                                    <hr class="message-inner-separator">
                                    <p>{!! $message->message !!}</p>
                                </div>
                              </li>  
                        @endforeach 
                       
                    @endif
                    <div class="text-center">
                     {!! $messages->links() !!}
                    </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

@endsection