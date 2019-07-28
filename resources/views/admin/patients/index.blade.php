@extends('admin.layouts.gen')
@section('title', 'The patients')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

          <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2> patients </h2>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                         @endif
                    </div>
                    @if ($role_patients->isEmpty())
                        <p> There is no patient.</p>
                    @else
                    <div class="panel-body">
                               @foreach($role_patients as $role_patient)
                               @foreach ($role_patient->users as $patient)
                                        <div class="col-lg-4 col-sm-6">

                                    <div class="card hovercard">
                            <div class="cardheader">

                            </div>
                            <div class="avatar">
                                      <img src="{{ URL::asset('images/users/'.$patient->id.'.jpg') }}" />
                            </div>
                            <div class="info">
                                <div class="title">
                                    <a target="_blank" href="{!! action('UsersController@showpatientprofile', $patient->id) !!}">{!! $patient->first_name !!}&nbsp;{!! $patient->last_name !!}</a>
                                </div>
                                <div class="desc">{!! $patient->department !!}</div>
                                <div class="desc">{!! $patient->telephone !!}</div>
                                <div class="desc">{!! $patient->email!!}</div>
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
                                <a class="btn btn-danger btn-sm" rel="publisher" href="{!! action('UsersController@pdfPatient', $patient->id) !!}">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-success btn-sm" rel="publisher" href="{!! action('UsersController@excelPatient', $patient->id) !!}">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-info btn-sm" rel="publisher" href="{!! action('UsersController@invoice', $patient->id) !!}">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                                @endforeach 
                                @endforeach
                    @endif
                    <div class="text-center"> 
                        {!! $role_patients->links() !!}
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





        