@extends('admin.layouts.gen')
@section('title', 'The Doctors')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

          <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2> Doctors </h2>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                         @endif
                    </div>
                    @if ($role_doctors->isEmpty())
                        <p> There is no Doctor.</p>
                    @else
                    <div class="panel-body">
                               @foreach($role_doctors as $role_doctor)
                               @foreach ($role_doctor->users as $doctor)
                                        <div class="col-lg-4 col-sm-6">

                                    <div class="card hovercard">
                            <div class="cardheader">

                            </div>
                            <div class="avatar">
                                      <img src="{{ URL::asset('images/users/'.$doctor->id.'.jpg') }}" />
                            </div>
                            <div class="info">
                                <div class="title">
                                    <a target="_blank" href="{!! action('UsersController@showdoctorprofile', $doctor->id) !!}">{!! $doctor->first_name !!}&nbsp;{!! $doctor->last_name !!}</a>
                                </div>
                                <div class="desc">{!! $doctor->department !!}</div>
                                <div class="desc">{!! $doctor->telephone !!}</div>
                                <div class="desc">{!! $doctor->email!!}</div>
                                <div class="desc"> 
                                    @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= round($doctor->reviews->avg('rating'),1)) ? '' : '-empty'}}"></span>
                                    @endfor
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {!!   $doctor->reviews->count() !!}&nbsp;Ratings
                                </div>
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
                                <a class="btn btn-danger btn-sm" rel="publisher" href="{!! action('UsersController@pdfDoctor', $doctor->id) !!}">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                 <a class="btn btn-success btn-sm" rel="publisher" href="{!! action('UsersController@excelDoctor', $doctor->id) !!}">
                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                                @endforeach 
                                @endforeach
                    @endif
                    <div class="text-center"> 
                        {!! $role_doctors->links() !!}
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection





        