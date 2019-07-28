@extends('admin.layouts.gen')
@section('title', 'Add Rooms')



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
                            <fieldset>
                                <!-- Title -->
                                <legend>Add A New Room</legend>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="no" value="{{ old('no') }}" pattern="[0-9]*" class="form-control" placeholder="no"
                                         data-error="Please enter the No." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="floor" value="{{ old('floor') }}" pattern="[0-9]*" class="form-control" placeholder="Floor" data-error="Please enter Floor." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <select class="form-control" name="department">
                                            @foreach($departments as $department)
                                            <option>{!! $department->name !!}</option>
                                            @endforeach
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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




 