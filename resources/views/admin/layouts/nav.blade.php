 <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <nav id="spy">
            <ul class="sidebar-nav nav">
                        <li class="sidebar-brand">
                        </li>

                        @role('admin')
                        <li><a href="{{ URL::asset('admin/departments') }}"><i class="fa fa-list-alt"></i> <span class="collapse in hidden-xs">Departments</span></a></li>
                        <li><a href="{{ URL::asset('admin/rooms') }}"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Rooms</span></a></li>
                        <li>
                        
                        <li>
                                <a href="#" data-target="#item1" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Staff<span class="caret"></span></span></a>
                                <ul class="nav nav-stacked collapse left-submenu" id="item1">
                                        <li><a href="{{ URL::asset('admin/doctors') }}">Doctors</a></li>
                                        <li><a href="{{ URL::asset('admin/nurses') }}">Nurses</a></li>
                                        <li><a href="{{ URL::asset('admin/patients') }}">Patients</a></li>
                                        <li><a href="{{ URL::asset('admin/receptionists') }}">Receptionists</a></li>
                                        <li><a href="{{ URL::asset('admin/editors') }}">Editors</a></li>
                                </ul>
                        </li>

                       <li><a href="{{ URL::asset('admin/posts') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Posts</span></a></li>
                        <li><a href="{{ URL::asset('admin/events') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Events</span></a></li>
                    
                          <li><a href="{{ URL::asset('admin/users') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Users</span></a></li>
                        <li><a href="{{ URL::asset('admin/log') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Activity Log
                        </span></a></li>

                        <li><a href="{{ URL::asset('admin/settings/1/edit') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Settings</span></a></li>


                        @endrole

                        @role('receptionist')
                        <li><a href="{{ URL::asset('admin/departments') }}"><i class="fa fa-list-alt"></i> <span class="collapse in hidden-xs">Departments</span></a></li>
                        <li><a href="{{ URL::asset('admin/rooms') }}"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Rooms</span></a></li>
                        <li>
                                <a href="#" data-target="#item1" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Staff<span class="caret"></span></span></a>
                                <ul class="nav nav-stacked collapse left-submenu" id="item1">
                                        <li><a href="{{ URL::asset('admin/doctors') }}">Doctors</a></li>
                                        <li><a href="{{ URL::asset('admin/nurses') }}">Nurses</a></li>
                                        <li><a href="{{ URL::asset('admin/patients') }}">Patients</a></li>
                                        <li><a href="{{ URL::asset('admin/receptionists') }}">Receptionists</a></li>
                                </ul>
                        </li>
                        <li><a href="{{ URL::asset('admin/users') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Users</span></a></li>
                        <li><a href="{{ URL::asset('admin/log') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Activity Log
                        </span></a></li>
                        @endrole                    

                        @role('doctor')
                        <li>
                                <a href="#" data-target="#item1" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Staff<span class="caret"></span></span></a>
                                <ul class="nav nav-stacked collapse left-submenu" id="item1">
                                        <li><a href="{{ URL::asset('admin/doctors') }}">Doctors</a></li>
                                        <li><a href="{{ URL::asset('admin/nurses') }}">Nurses</a></li>
                                        <li><a href="{{ URL::asset('admin/patients') }}">Patients</a></li>
                                        <li><a href="{{ URL::asset('admin/receptionists') }}">Receptionists</a></li>
                                </ul>
                        </li>
                        @endrole

                        @role('nurse')
                        <li>
                                <a href="#" data-target="#item1" data-toggle="collapse"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Staff<span class="caret"></span></span></a>
                                <ul class="nav nav-stacked collapse left-submenu" id="item1">
                                        <li><a href="{{ URL::asset('admin/doctors') }}">Doctors</a></li>
                                        <li><a href="{{ URL::asset('admin/nurses') }}">Nurses</a></li>
                                        <li><a href="{{ URL::asset('admin/patients') }}">Patients</a></li>
                                </ul>
                        </li>
                        @endrole


                        @role('editor')
                        <li><a href="{{ URL::asset('admin/posts') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Posts</span></a></li>
                        <li><a href="{{ URL::asset('admin/events') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Events</span></a></li>
                        <li><a href="{{ URL::asset('admin/messages') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Messages</span></a></li>
                        @endrole



                        @role('patient')
                        <li><a href="{!! action('UsersController@showpatientprofile', $patient->id) !!}"><i class="fa fa-list-alt"></i> <span class="collapse in hidden-xs">Your Profile</span></a></li>
                        <li><a href="{!! action('UsersController@showdoctorprofile', $doctorpatient->id) !!}"><i class="fa fa-list"></i> <span class="collapse in hidden-xs">Your Doctor Profile</span></a></li>
                        @endrole

                        <li><a href="{{ URL::asset('admin/messages') }}"><i class="glyphicon glyphicon-list-alt"></i> <span class="collapse in hidden-xs">Messages</span></a></li>


                    </ul>


                </nav>
        </div>



<!-- /sidebar -->
