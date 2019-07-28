@extends('admin.layouts.gen')
@section('title', 'Asclepius Admin Panel')


@section('links')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/weather.css') }}" >
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>


<script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: '2017-02-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
         @foreach($events as $event)

                {
                    id : '{!! $event->id !!}',
                    title: '{!! $event->title !!}',
                    start: '{!! $event->start !!}',
                    end: '{!! $event->end !!}',
                    url: ''
                },
         @endforeach
  
      ]
    });
    
  });

</script>

@endsection


@section('content')




 


              <div class="col-md-12">

              @can('receptionist-access')
               <p>Receptionist</p>
              @endcan
              @can('doctor-access')
              <p>Doctor</p>
              @endcan
              @can('nurse-access')
              <p>Nurse</p>
              @endcan
              @can('patient-access')
              <p>Patient</p>
              @endcan 
              </div>          

 <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="page-content">
            <div class="container-fluid">

              <div class="row">
                   <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                               <div class="col-md-3">
                                <div class="well dash-box wellsuccess text-center">
                                  <button type="button" class="wellsuccess btn-circle btn-lg"><i class="glyphicon glyphicon-user"></i></button>
                                  <h4>{!! $countusers !!}&nbsp;Users</h4>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="well dash-box wellinfo text-center">
                                  <button type="button" class="wellinfo btn-circle btn-lg"><i class="glyphicon glyphicon-pencil"></i></button>
                                  <h4>{!! $countposts !!}&nbsp;Posts</h4>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="well dash-box wellwarning text-center">
                                  <button type="button" class="wellwarning btn-circle btn-lg"><i class="fa fa-hand-o-up" aria-hidden="true"></i></button>
                                  <h4>{!! $visitorsclicks !!}&nbsp;Clicks</h4>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="well dash-box welldanger text-center">
                                  <button type="button" class="welldanger btn-circle btn-lg"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
                                  <h4>{!! $visitorsnum !!} Visitors</h4>
                                </div>  
                            </div>
                        </div>
                    </div>
                  </div>
              </div>


              <div class="row">

                  <div class="col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-body">
                              <div id="temps_div" class="col-md-6 content noscroll" style="height: 300px;" ></div>
                              <?= $lava->render('LineChart', 'Temps', 'temps_div') ?>



                        <div class="col-md-6">

                            <h3 class="text-center">Goals Accomplished</h3>

                            <h4>Departments</h4>
                             <div class="progress">
                              <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                40%
                              </div>
                            </div>

                            <h4>Departments</h4>
                            <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                              40%
                            </div>
                          </div>

                          <h4>Rooms</h4>
                          <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                              40%
                            </div>
                          </div>

                          <h4>Doctors</h4>
                          <div class="progress">
                            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                              40%
                            </div>
                          </div>
                        </div>

                        </div>
                  </div>
                  </div>

              </div>


 


              <div class="row">
                <div class="col-md-4">
                  <div class="panel panel-default colorone">
                    <div class="panel-heading">
                      Last Departments
                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                    </div>
                      <ul class="content list-group">
                        @foreach($departments as $department)

                          <li class="list-group-item">{!! $department->name !!}</li>

                        @endforeach
                      </ul>    
                  </div>
              </div>


              <div class="col-md-4">
                  <div class="panel panel-default colortwo">
                      <div class="panel-heading">
                          Last Rooms
                          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                      </div>
                      <ul class="content list-group"> 
                          @foreach($rooms as $room)
                            <li class="list-group-item">{!! $room->no !!}</li>
                          @endforeach
                      </ul>     
                  </div>
              </div>

              <div class="col-md-4">
                          <div class="panel panel-default colorseven">
                              <div class="panel-heading">
                                      Chart
                                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                              </div>
                               <div id="perf_div" class="content noscroll"></div>
                               <?= $lava->render('ColumnChart', 'Finances', 'perf_div') ?>
                      </div>
                </div>

             
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default colorthree">
                        <div class="panel-heading">
                           User Statistics
                           <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                            <div id="pop-div" class="content noscroll"></div>
                            <?= $lava->render('AreaChart', 'Users', 'pop-div') ?>
                    </div>
                </div>
                <div class="col-md-6">                    
                    <div class="panel panel-default colorfour">
                        <div class="panel-heading">
                              Weather
                              <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <div class="content noscroll" id="weather" style="padding: 10px;"></div>
                    </div>
                </div>
            </div>




            <div class="row">

                <div class="col-md-4">
                    <div class="panel panel-default colorfive">
                    <div class="panel-heading">
                        Last Posts
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                    </div>
                    <ul class="content list-group"> 
                        @foreach($posts as $post)

                           <li class="list-group-item">
                           <div class="media">
                          <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="{{ URL::asset('images/posts/'.$post->id.'.jpg') }}" style="width: 50px;height: 50px;">
                          </a>
                          <div class="media-body">
                          <h4 class="media-heading">{!! $post->title !!}</h4>
                          <p>{!! Str_limit($post->content , 10) !!}</p>
                          <ul class="list-inline list-unstyled">
                          <li><span><i class="glyphicon glyphicon-calendar"></i>{{ $post->created_at->diffForHumans() }}</span></li>
                          <li>|</li>
                          <span><i class="glyphicon glyphicon-eye-open"></i> 2</span>
                          <li>|</li>
                          <li>
                             <span class="glyphicon glyphicon-star"></span>
                                      <span class="glyphicon glyphicon-star"></span>
                                      <span class="glyphicon glyphicon-star"></span>
                                      <span class="glyphicon glyphicon-star"></span>
                                      <span class="glyphicon glyphicon-star-empty"></span>
                          </li>
                          </ul>
                          </div>
                          </div>
                          </li>
                        @endforeach 
                    </ul>
                    </div>
                </div>





   <div class="col-md-4">
              <div class="panel panel-default colorsix">
                  <div class="panel-heading">
                      Staff Statistics
                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                  </div>
                  <div id="chart-div" class="content noscroll"></div>
                  <?= $lava->render('PieChart', 'Analysis', 'chart-div') ?>
              </div>
          </div>

                <div class="col-md-4">
                    <div class="panel panel-default colorone">
                        <div class="panel-heading">
                           Last Messages
                           <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                        </div>
                        <ul class="content list-group"> 
                            @foreach($messages as $message)
                              <li class="list-group-item">
                                <div class="alert alert-danger colorone">
                                    <a href="{!! action('MessagesController@show', $message->id) !!}"><span class="glyphicon glyphicon-info-sign"></span> <strong>Message From {!! $message->sender->first_name !!}&nbsp;
                                    {!! $message->sender->last_name !!}</strong></a>
                                    <hr class="message-inner-separator">
                                    <p>{!! $message->message !!}</p>
                                </div>
                              </li>  
                            @endforeach
                        </ul> 
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default coloreight">
                    <div class="panel-heading">
                        Last Users
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                    </div>
                    <div class="content panel-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Joined</th>
                            </tr>

                            @foreach($users as $user)
                                <tr>
                                    <td>{!! $user->first_name !!}&nbsp;{!! $user->last_name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->created_at !!}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    </div>
                </div>   
           </div>



          <div class="row">

               <div class="col-md-4">
                  <div class="panel panel-default colorthirteen">
                  <div class="panel-heading">
                      Rating Doctors
                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                  </div>
                      <ul class="content list-group"> 
                          @foreach($doctors as $doctor)
                          <li class="list-group-item"> 
                          rating 
                            {!!  $doctor->reviews->avg('rating') !!}
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            round
                             @for ($i=1; $i <= 5 ; $i++)
                            <span class="glyphicon glyphicon-star{{ ($i <= round($doctor->reviews->avg('rating'),1)) ? '' : '-empty'}}"></span>
                            @endfor
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            count
                            {!!   $doctor->reviews->count() !!}
                           </li>
                        @endforeach
                      </ul>
                  </div>
              </div>
                 
                <div class="col-md-4">
                          <div class="panel panel-default colortwelve">
                              <div class="panel-heading">
                                      Chart
                                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                              </div>
                              <div id="chartone-div" class="content noscroll"></div>
                              <?= $lava->render('DonutChart', 'IMDB', 'chartone-div') ?>
                      </div>
                </div>
                <div class="col-md-4">
                          <div class="panel panel-default colorfourteen">
                              <div class="panel-heading">
                                      Latest Users
                                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                              </div>
                              <div class="content">
                                  @foreach($users as $user)

                                      <img class="img-circle" src="{{ URL::asset('images/users/'.$user->id.'.jpg') }}" style="width:50px;height:50px"/>

                                  @endforeach
                              </div>
                      </div>
                </div>

          </div>

         


           <div class="row">
             <div class="col-md-12">
                      <div class="panel panel-default colorten">
                          <div class="panel-heading">
                                   Chart
                                   <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                          </div>
                          <div id="popone-div" class="content noscroll"></div>
                          <?= $lava->render('GeoChart', 'Popularity', 'popone-div') ?>
                  </div>
            </div>
          </div>

          <div class="row">

              <div class="col-md-4">
                  <div class="panel panel-default colorone">
                      <div class="panel-heading">
                          Log Activity
                          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                      </div>
                      <div class="content activity-feed" style="height: 1000px;"> 
                      @foreach($logs as $log)
                          <div class="feed-item">
                             
                             <div class="date">{!! $log->created_at !!}</div> 
                             <div class="text">{!! $log->text !!}</div>

                          </div>

                      @endforeach 
                      </div>
                  </div>
              </div>

              
       

          <div class="col-md-8">
              <div class="panel panel-default colortwo">
                  <div class="panel-heading">
                      Calendar
                      <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                  </div>
                  <div id='calendar' class="content" style="height: 580px;"></div>
              </div>
          </div>


        




          <div class="col-md-4">
                  <div class="panel panel-default coloreleven">
                  <div class="panel-heading">
                    About
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                  </div>
                  <div class="content">
                  @foreach($settings as $setting)

                  {!! $setting->name !!}

                  @endforeach
                  </div>
              </div>

          </div>

             <div class="col-md-4">
                      <div class="panel panel-default colorthirteen">
                          <div class="panel-heading">
                                  Visitors
                                   <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                          </div>
                       
                       @foreach($visitors as $visitor)
                       <h1>ip</h1>
                       {!! $visitor->ip !!}
                       <h1>Country</h1>
                       {!! $visitor->country !!}
                       @endforeach  
                  </div>
            </div>
            </div>

         


          




            </div>
        </div>
    </div>

              
    


@endsection


@section('scripts')


 <script src="{{ URL::asset('js/jquery.simpleWeather.min.js') }}"></script> 
 <script src="{{ URL::asset('js/weather.js') }}"></script>

 <script type="text/javascript">
   $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
  if(!$this.hasClass('panel-collapsed')) {
    $this.parents('.panel').find('.content').slideUp();
    $this.addClass('panel-collapsed');
    $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
  } else {
    $this.parents('.panel').find('.content').slideDown();
    $this.removeClass('panel-collapsed');
    $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
  }
});
 </script> 

@endsection

 