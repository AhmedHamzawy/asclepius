@extends('admin.layouts.gen')
@section('title', 'Add Events')



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
                                <legend>Add A New Event</legend>
                                   
                                    <div class="form-group has-feedback">
                                        <input type="text" name="title" value="{{ old('title') }}"  pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Title" data-error="Please enter Title." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="text" name="url" value="{{ old('url') }}"  pattern="https?://.+" class="form-control" placeholder="Url" data-error="Please enter Url." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="date" name="start" value="{{ old('start') }}" placeholder="startdate" class="form-control" data-error="Please enter startdate." required />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="form-group has-feedback">
                                        <input type="date" name="end" value="{{ old('end') }}" placeholder="enddate" class="form-control" data-error="Please enter enddate." />
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   

                                   

                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-default"><a href="{{ URL::asset('admin/events') }}">Cancel</a></button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
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




 