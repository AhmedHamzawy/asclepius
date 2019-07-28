@extends('admin.layouts.gen')
@section('title', 'Change Settings')



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
                            <legend>Change The Settings</legend>
                            <div class="form-group has-feedback">
                                <input type="text" name="name" value="{!! $settings->name !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="User Name"
                                data-error="Please enter Name." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                             <div class="form-group has-feedback">
                                <textarea rows="10" name="address" pattern="[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*" class="form-control" placeholder="Address" data-error="Please enter Address." required>{!! $settings->address !!}</textarea> 
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="town" value="{!! $settings->town !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Town" data-error="Please enter Town." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="county" value="{!! $settings->county !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="County" data-error="Please enter County." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="post_code" value="{!! $settings->post_code !!}" pattern="[0-9]*" class="form-control" placeholder="postcode" data-error="Please enter Postcode." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="country" value="{!! $settings->country !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Country" data-error="Please enter Country." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="telephone" value="{!! $settings->telephone !!}" pattern="[0-9]*" class="form-control" placeholder="Telephone" data-error="Please enter Telephone." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" value="{!! $settings->email !!}" class="form-control" placeholder="Email" data-error="Please enter Email." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="website" value="{!! $settings->website !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Website" data-error="Please enter website." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="facebook" value="{!! $settings->facebook !!}" pattern="https?://.+" class="form-control" placeholder="Facebook" data-error="Please enter facebook." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="twitter" value="{!! $settings->twitter !!}" pattern="https?://.+" class="form-control" placeholder="Twitter" data-error="Please enter Twitter." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>            
                           <div class="form-group has-feedback">
                                <input type="text" name="instagram" value="{!! $settings->instagram !!}" pattern="https?://.+" class="form-control" placeholder="Instagram" data-error="Please enter Instagram." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" name="youtube" value="{!! $settings->youtube !!}" pattern="https?://.+" class="form-control" placeholder="Youtube" data-error="Please enter Youtube." required />
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                          
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-default"><a href="{{ URL::asset('admin/dashboard') }}">Cancel</a></button>
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


