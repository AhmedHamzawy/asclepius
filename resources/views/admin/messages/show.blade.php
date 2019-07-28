@extends('admin.layouts.gen')
@section('title', 'The Messages')

@section('links')

          <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/message.css') }}">

@endsection


@section('content')


<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div id="tb-testimonial" class="testimonial testimonial-success-filled">
                        <div class="testimonial-section">
                            {!! $message->message !!}
                        </div>
                        <div class="testimonial-desc">
                            <img src="{{ URL::asset('images/users/'.$message->sender->id.'.jpg') }}" />
                            <div class="testimonial-writer">
                                <div class="testimonial-writer-name">{!! $message->sender->firstname !!}&nbsp;{!! $message->sender->lastname !!}</div>
                                <div class="testimonial-writer-designation">{!! $message->sender->role !!}</div>
                                <a href="#" class="testimonial-writer-company">{!! $message->subject !!}</a>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection        