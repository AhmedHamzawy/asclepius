@extends('admin.layouts.gen')
@section('title', 'The nurses')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

          <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2> nurses </h2>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                         @endif
                    </div>
                    @if ($role_nurses->isEmpty())
                        <p> There is no nurse.</p>
                    @else
                    <div class="panel-body">
                               @foreach($role_nurses as $role_nurse)
                               @foreach ($role_nurse->users as $nurse)
                                        <div class="col-lg-4 col-sm-6">

                                    <div class="card hovercard">
                            <div class="cardheader">

                            </div>
                            <div class="avatar">
                                      <img src="{{ URL::asset('images/users/'.$nurse->id.'.jpg') }}" />
                            </div>
                            <div class="info">
                                <div class="title">
                                    <a target="_blank" href="{!! action('UsersController@shownurseprofile', $nurse->id) !!}">{!! $nurse->first_name !!}&nbsp;{!! $nurse->last_name !!}</a>
                                </div>
                                <div class="desc">{!! $nurse->department !!}</div>
                                <div class="desc">{!! $nurse->telephone !!}</div>
                                <div class="desc">{!! $nurse->email!!}</div>
                            </div>
                            <div class="bottom">
                                <a class="btn btn-primary btn-twitter btn-sm" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" rel="publisher"
                                   href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" rel="publisher"
                                   href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                                    <i class="fa fa-behance"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" rel="publisher" href="{!! action('UsersController@pdfNurse', $nurse->id) !!}">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                 <a class="btn btn-success btn-sm" rel="publisher" href="{!! action('UsersController@excelNurse', $nurse->id) !!}">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                                @endforeach 
                                @endforeach
                    @endif
                    <div class="text-center" style="clear: both;"> 
                        {!! $role_nurses->links() !!}
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





        