@extends('admin.layouts.gen')
@section('title', 'Send Message')



@section('content')

<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="well well bs-component">
                    <!-- Form  -->
                    <form class="form-horizontal" data-toggle="validator" method="post">
                        <fieldset>
                            <!-- Title -->
                            <legend>Send Message</legend>
                            <div class="form-group has-feedback">
                                <input type="text" name="from" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,150}$" class="form-control" value="{!! $sender !!}"
                                data-error="Please enter Sender." disabled required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="to">
                                    @foreach($recievers as $reciever)
                                    @unless($reciever->user_name == Auth::user()->user_name)
                                    <option>{!! $reciever->user_name !!}</option>
                                    @endunless
                                    @endforeach
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="subject" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,150}$" class="form-control" placeholder="subject" 
                                data-error="Please enter subject."  required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <textarea rows="10" name="message" pattern="[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*" class="form-control" placeholder="Message" data-error="Please enter Message." required></textarea> 
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group">
                                <div class="textcenter">
                                    <button class="btn btn-default"><a href="{{ URL::asset('admin/messages') }}">Cancel</a></button>
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



 