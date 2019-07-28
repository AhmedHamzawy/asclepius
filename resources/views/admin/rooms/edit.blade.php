@extends('admin.layouts.gen')
@section('title', 'Edit Room')



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
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <fieldset>
                                <!-- Title -->
                                <legend>Edit A Room {!! $room->no !!}</legend>
                                     <div class="form-group has-feedback">
                                        <input type="text" name="no" value="{!! $room->no !!}" pattern="[0-9]*" class="form-control" placeholder="no"
                                         data-error="Please enter the No." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="floor" value="{!! $room->floor !!}" pattern="[0-9]*" class="form-control" placeholder="Floor" data-error="Please enter Floor." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="department">
                                            <option selected disabled>Department</option>
                                            @foreach($departments as $department)
                                            <option {{ $room->department_id === $department->id ? 'selected' : '' }}>{!! $department->name !!}</option>
                                            @endforeach        
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                   

                                <div class="form-group text-center">
                                        <button class="btn btn-default"><a href="{{ URL::asset('admin/rooms') }}">Cancel</a></button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
