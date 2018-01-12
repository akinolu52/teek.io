@extends('layout.user')

@section('title', 'calendar')

@section('content')
    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title">Calendar</h3>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-2 col-md-3">

                <h4>Created Tasks</h4>
                <span id="chartCalendar" data-value="{{ route('task.calendar') }}"></span>

                <div id='external-events'>
                    @foreach($tasks as $task)
                        <div class='fc-event'>{{ $task->title }}</div>
                    @endforeach
                </div>
            </div>

            <div id='calendar' class="col-md-9 col-lg-10"></div>

        </div>
        <!-- page end-->

    </div> <!-- END Wraper -->
@endsection

@section('extra-js')

    <script src="{{ asset('auth/js/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script src="{{ asset('auth/assets/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ asset('auth/assets/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('auth/assets/fullcalendar/calendar-init.js') }}"></script>

@endsection

@section('extra-css')
    <link href="{{ asset('auth/assets/fullcalendar/fullcalendar.css') }}" rel="stylesheet" />
@endsection

