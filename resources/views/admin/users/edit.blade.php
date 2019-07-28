@extends('admin.layouts.gen')
@section('title', 'Edit Users')



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
                                <legend>Edit A User {!! $user->user_name !!}</legend>
                                <div class="form-group has-feedback">
                                    <input type="text" name="user_name" value="{!! $user->user_name !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="User Name"
                                    data-error="Please enter User Name." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="first_name" value="{!! $user->first_name !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="First Name" data-error="Please enter First Name." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="middle_name" value="{!! $user->middle_name !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Middle Name" data-error="Please enter Middle Name." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="last_name" value="{!! $user->last_name !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Last Name" data-error="Please enter Last Name." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="gender">
                                        <option selected disabled>Gender</option>
                                        <option {{ $user->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                        <option {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="date" name="birthdate" value="{!! $user->birthdate !!}" placeholder="Birthdate" class="form-control" data-error="Please enter Birthdate." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="age" value="{!! $user->age !!}" pattern="[0-9]*" class="form-control" placeholder="Age" data-error="Please enter Age." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="telephone" value="{!! $user->telephone !!}" pattern="[0-9]*" class="form-control" placeholder="Telephone" data-error="Please enter Telephone." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email" name="email" value="{!! $user->email !!}" class="form-control" placeholder="Email" data-error="Please enter Email." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <textarea rows="10" name="address" pattern="[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*" class="form-control" placeholder="Address" data-error="Please enter Address." required>{!! $user->address !!}</textarea> 
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="street" value="{!! $user->street !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Street" data-error="Please enter Street." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="town" value="{!! $user->town !!}" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,255}$" class="form-control" placeholder="Town" data-error="Please enter Town." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <select class="form-control" name="country">
                                        <option selected disabled>Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if($user->country == $country->id) { selected } @endif>{!! $country->name !!}</option>
                                        @endforeach        
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <textarea rows="10" name="other" pattern="[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*" class="form-control" placeholder="Other" data-error="Please enter Other." required>{!! $user->other !!}</textarea> 
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="role" id="role">
                                        <option selected disabled>Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role_user[0]->role_id == $role->id ? 'selected' : '' }}>{!! $role->name !!}</option>
                                        @endforeach  
                                        <div class="help-block with-errors"></div>
                                    </select>                           
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="department">
                                        <option selected disabled>Department</option>
                                        @foreach($departments as $department)
                                        <option {{ $user->department_id === $department->id ? 'selected' : '' }}>{!! $department->name !!}</option>
                                        @endforeach        
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div> 
                                <div class="form-group has-feedback">
                                    <input type="password" name="password" class="form-control" placeholder="Password" data-error="Please enter Password." required />
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                     <input type="file" name="image" accept="image/*" class="form-control"  />
                                </div>
                                <div class="addition"></div>
                                <div class="form-group text-center">
                                        <button class="btn btn-default"><a href="{{ URL::asset('admin/users') }}">Cancel</a></button>
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


@section('scripts') 

    <script type="text/javascript">
    $('#role').change(function(){
    if( $(this).val() == 6){
       $('.addition').append('<div class="form-group ad"><select class="form-control selectroom" name="room_id"><option selected disabled>Room</option></select></div>');
        @foreach($rooms as $room)
        $('.selectroom').append("<option value='{{ $room->id }}'>{!! $room->no !!}</option>");
        @endforeach
        $('.addition').append('<div class="form-group ad"><select class="form-control selectdoc" name="doctor_id"><option selected disabled>Doctor Name</option></select></div>');
        @foreach($role_doctors as $role_doctor)
        @foreach ($role_doctor->users as $doctor)          
        $('.selectdoc').append("<option value='{{ $doctor->id }}'>{!! $doctor->user_name !!}</option>");
        @endforeach
        @endforeach
        $('.addition').append('<div class="form-group ad"><input type="date" name="appointment" value="{!! $user->appointment !!}" class="form-control" id="appointment" /></div>');
        $('.addition').append('<div class="form-group ad"><input type="text" name="sickness" value="{!! $user->sickness !!}" placeholder="Sickness" class="form-control" id="sickness" /></div>');
        $('.addition').append('<div class="form-group ad"><input type="text" name="prescription" value="{!! $user->prescription !!}" placeholder="Prescription" class="form-control" id="prescription" /></div>');
        $('.addition').append('<div class="form-group ad"><input type="text" name="price" value="{!! $user->price !!}" placeholder="Price" class="form-control" id="price" /> </div>');
    }else{
       $('.ad').remove();
       $('.ader').remove();
     }
    });
    </script>

@endsection
 