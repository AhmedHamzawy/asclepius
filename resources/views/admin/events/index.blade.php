@extends('admin.layouts.gen')
@section('title', 'The Events')


@section('links')


  

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js'></script>

    

    <script>

    

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'listDay,listWeek,month'
            },

            // customize the button names,
            // otherwise they'd all just say "list"
            views: {
                listDay: { buttonText: 'list day' },
                listWeek: { buttonText: 'list week' }
            },

            defaultView: 'listWeek',
            defaultDate: Date.now(),
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


<!-- Page content -->
<div id="page-content-wrapper">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a href="{!! action('EventsController@create') !!}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                             <a href="{!! action('EventsController@listEvents') !!}" class="btn btn-info pull-right"><span class="glyphicon glyphicon-th-list"></span></a>
                            <h2> Event </h2>
                        </div>
                        @if ($events->isEmpty())
                            <p> There is no Event.</p>
                        @else
                            <div id='calendar'></div>
                        @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
