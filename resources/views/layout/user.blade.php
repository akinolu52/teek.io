<?php $hashId = \Teek\Http\Controllers\UserController::numHash(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{--<link rel="shortcut icon" href="img/favicon_1.ico">--}}


    <title>Teek - @yield('title')</title>

    <!-- Google-Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic'
          rel='stylesheet'>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('auth/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/bootstrap-reset.css') }}" rel="stylesheet">
@yield('extra-css')

<!--Animation css-->
    <link href="{{ asset('auth/css/animate.css') }}" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="{{ asset('auth/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('auth/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet"/>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('auth/assets/morris/morris.css') }}">

    <!-- sweet alerts -->
    <link href="{{ asset('auth/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style-responsive.css') }}" rel="stylesheet"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('auth/js/html5shiv.js') }}"></script>
    <script src="{{ asset('auth/js/respond.min.js') }}"></script>
    <![endif]-->


</head>


<body>

<!-- Aside Start-->
<aside class="left-panel">

    <!-- brand -->
    <div class="logo">
        <a href="{{ route('welcome') }}" class="logo-expanded">
            {{--<img src="img/single-logo.png" alt="logo">--}}
            <span class="nav-label">Teek</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            @if(Auth::user()->role == 'user')
                <li><a href="{{ route('user.dashboard') }}"><i class="ion-home"></i> <span
                                class="nav-label">Dashboard</span></a>
                <li><a href="{{ route('user.profile', $hashId) }}"><i
                                class="ion-android-user-menu"></i> <span class="nav-label">Profile</span></a>
                </li>
            @else
                <li><a href="{{ route('assistant.dashboard') }}"><i class="ion-home"></i> <span
                                class="nav-label">Dashboard</span></a>
                </li>
                <li><a href="{{ route('assistant.profile', urlencode(strtolower(Auth::user()->name))) }}"><i
                                class="ion-android-user-menu"></i> <span class="nav-label">Profile</span></a>
                </li>
            @endif

                @if(Auth::user()->role == 'user')
                    <li>
                        <a href="{{ route('task.index') }}">
                            <i class="fa fa-tasks"></i>
                            <span class="nav-label">Task</span>
                        </a>
                    </li>
                    <li><a href="{{ route('user.calendar') }}"><i class="ion-calendar"></i> <span
                                    class="nav-label">Calendar</span></a>
                    </li>
                @endif

                @if(Auth::user()->role == 'assistant')
                    <li>
                        <a href="{{ route('assistant.task') }}">
                            <i class="fa fa-tasks"></i>
                            <span class="nav-label">Task</span>
                        </a>
                    </li>
                @endif
        </ul>
    </nav>

</aside>
<!-- Aside Ends-->


<!--Main Content Start -->
<section class="content">

    <!-- Header -->
    <header class="top-head navbar-fixed-top container-fluid m-b-15" {{--style="left: 230px;"--}} >
        <button type="button" class="navbar-toggle pull-left">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Right navbar -->
        <ul class="list-inline navbar-right top-menu top-right-menu">
            <!-- Notification -->
            @if(Auth::user()->role == 'assistant')
                <?php  $notifyCount = \Teek\Http\Controllers\AssistantController::checkNotification(); ?>
                @if($notifyCount)
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-sm up bg-pink count noti-count"
                                  data-value="{{ $notifyCount }}">{{ $notifyCount }}</span>
                        </a>
                        <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                            <li class="noti-header">
                                <p>Notifications</p>
                            </li>
                            {{ csrf_field() }}
                            @foreach(\Teek\Http\Controllers\AssistantController::notifications() as $notification)
                                <li class="notify-msg" data-value="{{ $notification->id }}">
                                    <input type="hidden" id="nurl" data-value="{{ route('notify.update') }}">
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-info"></i></span>
                                        <span>{{ $notification->message }}<br>
                                        <small class="text-muted">
                                            <?= \Teek\Http\Controllers\AssistantController::timeAgo($notification->created_at) ?>

                                        </small></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @elseif(Auth::user()->role == 'user')
                <?php $userNotifyCount = \Teek\Http\Controllers\UserController::checkNotification(); ?>
                @if($userNotifyCount)
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-bell-o"></i>
                            <span class="badge badge-sm up bg-pink count noti-count"
                                  data-value="{{ $userNotifyCount }}">{{ $userNotifyCount }}</span>
                        </a>
                        <ul class="dropdown-menu extended fadeInUp animated nicescroll" tabindex="5002">
                            <li class="noti-header">
                                <p>Notifications</p>
                            </li>
                            {{ csrf_field() }}
                            @foreach(\Teek\Http\Controllers\UserController::notifications() as $notification)
                                <li class="notify-msg" data-value="{{ $notification->id }}">
                                    <input type="hidden" id="nurl" data-value="{{ route('notify.update') }}">
                                    <a href="#">
                                        <span class="pull-left"><i class="fa fa-bell-o fa-2x text-info"></i></span>
                                        <span>{{ $notification->message }}<br>
                                        <small class="text-muted">
                                            <?= \Teek\Http\Controllers\AssistantController::timeAgo($notification->created_at) ?>
                                        </small></span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                <li>
                    <a title="Add new task" data-toggle="modal" data-target="#con-close-modal" href="#">
                        <i>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPpSURBVGhD7VlJaxRBFB5JXBHc0ZnpnkFR0JzEeHS5qLiAIgjqyZMRFEz+gF4UVPQaMYh6mu6eFtwNenHwHiFICCFTNWOiSUBFQTFRDBm/KgttJs/O9FIzEPzgY5au9973ql7X0p34j9mKpMszqTw7YTi8CyykHTZq2PwLvlcMm03i9yd8DqQd/gDfL6Ycviv5aGSRMm8sjPzw8rTN2tM275GCAxK240gqZ1jFvYlKZY5yWz8kcwMrIf7Knx6PgzbrTVv8SH0SQpB0vnQSgT9MExIfC1m7vElFjB+pe/0rDIc9IQLHTpTbBMquTYWOD8lceSOSeEMF1UkkcytRKDQrGdFgWmwr7oWPVKD6kD1ucfvmKTnhkMkPtiCJ93SAepK5CbfSpGQFw+97gg9Pd9oYosyuKWkBgNmpXjd2zbTZlGmVDiqFtUFNsbTDAMRa8wMrOccsNEJdD0xR5liElUx/yJKK6eZGObwWPk2Xb6Ouh6LNb0ihM0Gu2JSDENSTCPZtObZBiv0XxLAh46+kgxDUkggo1xc/pC12ljIMS22JYOXP3i8vlaIpYDReUYZhqSsRQfimtzDiPEEZRKHORMBuKbwa6lBEGYSm1kRwhGjt6pkrxXuBi+JkRxuFpOYRqSSd4hYp3gsEfUk1jkLdiRh5dlyK9wLrxzuycQRqT8Rm56R4L0TNkY2rKLcdOKPXRIc7wnfKLW8mr9MsUnEpoqOmbySphiRtNqRMtABr2QEyLkGsJ9eV2V9gRH5SjauJXhjLuKy1JuI8I3yvcvsWk9cJwn87FZci2nZK8V7gz89U4yiET733iMMuSfFeYJj66cbhqTsRMXpSvBdI5CHVOAq1J+Kw/VK8F5gtLlCNo1B3ImJbJcV7YVp8N9U4CnUmIk6eUng1cBZZiKn1G2UUllpHxO+kiPKySKOQ1JpIvrRTiqZg2qU9pFFI6koEfkv+D7vFYyCb9VLGYahxRE5LvX4Qj/YJw1DUlMjb7J3yAinWF3JU+AvCQWCKEhBvpjDfd1DXw5EdU0pnhng/ARHjtKPGER3yXEmsHTA6RTlrFKFndK3FVyt5wYBRuUk5rTdldfhNtzPCrTShJ2LfgwWizSYDP7ymsL57cD5usLtkEM1EJ04YFjuspMQAMTI4VqJ3pqiAOoh4Y6bNtysF8cK0i4cwNWt/g4UknmXd8hoVVg8yuaFlYsMmapcSEYUopRF01lEVqj4Qj/axybwNfqdEBSESKBsWP1Pbiq0J61y+BKXQhlF6Ctb8SgLnCYbPLsMp7fDfADYChUKzeIwpngCi9M6jp68KsUi0E5+X8bsD3/el7KKpLP5jliKR+AU3iab4xlMMUwAAAABJRU5ErkJggg==">
                        </i>
                        <small class="username">&nbsp;Add Task</small>
                    </a>
                </li>
        @endif

        <!-- /Notification -->

            <!-- user login dropdown start-->
            <li class="dropdown text-center">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{ Auth::user()->avatar }}" class="img-circle profile-img preview_image thumb-sm">
                    <span class="username">{{ Auth::user()->name }}</span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu extended pro-menu fadeInUp animated" tabindex="5003"
                    style="overflow: hidden; outline: none;">
                    @if (\Route::current()->getName() == 'user.profile')
                        <li><a href="javascript:changeProfile()"><i class="ion-edit"></i> Change Pic</a></li>
                    @endif
                    <li><a href="{{ route('user.profile', $hashId) }}"><i class="fa fa-briefcase"></i>Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form2').submit();">
                            <i class="fa fa-sign-out"></i> Log Out
                            <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>
                    <input type="file" id="file" style="display: none"/>
                    <input type="hidden" id="file_name"/>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!-- End right navbar -->

    </header>
    <!-- Header Ends -->


    <!-- Page Content Start -->
    <!-- ================== -->
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add new task</h4>
                </div>
                <div class="todoapp p-0">
                    <form name="todo-form" id="todo-form2">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" id="todo-user-url" data-value="{{ route('task.user') }}">
                            <input type="hidden" id="todo-url" data-value="{{ route('task.store') }}">
                            <div class="row">
                                <div class="col-sm-12 form-group todo-inputbar">
                                    <label>Name</label>
                                    <input type="text" id="todo-input-text2" name="title"
                                           class="form-control" placeholder="Name of the task">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group todo-inputbar">
                                    <label>Description</label>
                                    <textarea name="description" id="todo-description" cols="10" rows="1"
                                              class="form-control autogrow"
                                              placeholder="Description of the task"
                                              style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                </div>
                            </div>
                            <div class="row todo-inputbar ">
                                <div class="col-sm-4 form-group pointer" title="Add end date"
                                     style="margin-top: 1px;" id="modal-toggle-date">
                                    <i>
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPpSURBVGhD7VlJaxRBFB5JXBHc0ZnpnkFR0JzEeHS5qLiAIgjqyZMRFEz+gF4UVPQaMYh6mu6eFtwNenHwHiFICCFTNWOiSUBFQTFRDBm/KgttJs/O9FIzEPzgY5au9973ql7X0p34j9mKpMszqTw7YTi8CyykHTZq2PwLvlcMm03i9yd8DqQd/gDfL6Ycviv5aGSRMm8sjPzw8rTN2tM275GCAxK240gqZ1jFvYlKZY5yWz8kcwMrIf7Knx6PgzbrTVv8SH0SQpB0vnQSgT9MExIfC1m7vElFjB+pe/0rDIc9IQLHTpTbBMquTYWOD8lceSOSeEMF1UkkcytRKDQrGdFgWmwr7oWPVKD6kD1ucfvmKTnhkMkPtiCJ93SAepK5CbfSpGQFw+97gg9Pd9oYosyuKWkBgNmpXjd2zbTZlGmVDiqFtUFNsbTDAMRa8wMrOccsNEJdD0xR5liElUx/yJKK6eZGObwWPk2Xb6Ouh6LNb0ihM0Gu2JSDENSTCPZtObZBiv0XxLAh46+kgxDUkggo1xc/pC12ljIMS22JYOXP3i8vlaIpYDReUYZhqSsRQfimtzDiPEEZRKHORMBuKbwa6lBEGYSm1kRwhGjt6pkrxXuBi+JkRxuFpOYRqSSd4hYp3gsEfUk1jkLdiRh5dlyK9wLrxzuycQRqT8Rm56R4L0TNkY2rKLcdOKPXRIc7wnfKLW8mr9MsUnEpoqOmbySphiRtNqRMtABr2QEyLkGsJ9eV2V9gRH5SjauJXhjLuKy1JuI8I3yvcvsWk9cJwn87FZci2nZK8V7gz89U4yiET733iMMuSfFeYJj66cbhqTsRMXpSvBdI5CHVOAq1J+Kw/VK8F5gtLlCNo1B3ImJbJcV7YVp8N9U4CnUmIk6eUng1cBZZiKn1G2UUllpHxO+kiPKySKOQ1JpIvrRTiqZg2qU9pFFI6koEfkv+D7vFYyCb9VLGYahxRE5LvX4Qj/YJw1DUlMjb7J3yAinWF3JU+AvCQWCKEhBvpjDfd1DXw5EdU0pnhng/ARHjtKPGER3yXEmsHTA6RTlrFKFndK3FVyt5wYBRuUk5rTdldfhNtzPCrTShJ2LfgwWizSYDP7ymsL57cD5usLtkEM1EJ04YFjuspMQAMTI4VqJ3pqiAOoh4Y6bNtysF8cK0i4cwNWt/g4UknmXd8hoVVg8yuaFlYsMmapcSEYUopRF01lEVqj4Qj/axybwNfqdEBSESKBsWP1Pbiq0J61y+BKXQhlF6Ctb8SgLnCYbPLsMp7fDfADYChUKzeIwpngCi9M6jp68KsUi0E5+X8bsD3/el7KKpLP5jliKR+AU3iab4xlMMUwAAAABJRU5ErkJggg==">
                                    </i>
                                    <small class="username">Add end date</small>
                                </div>
                                <div class="col-sm-8 form-group p-t-10 " id="modal-toggle-view">
                                    <input type="text" class="form-control datepicker"
                                           placeholder="dd/mm/yyyy" id="todo-input-date" name="edate"
                                           title="Enter date of completion">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row form-group right">
                                <div class="col-sm-3 col-sm-offset-9 todo-send">
                                    <button class="btn-info btn-block btn" type="button"
                                            id="todo-btn-submit2">Add Task
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@yield('content')
<!-- Page Content Ends -->
    <!-- ================== -->

    <!-- Footer Start -->
    <footer class="footer">
        Powered by Startup Studio. <?= date('Y') ?>
    </footer>
    <!-- Footer Ends -->


</section>
<!-- Main Content Ends -->


<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('auth/js/jquery.js') }}"></script>
<script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('auth/js/modernizr.min.js') }}"></script>
<script src="{{ asset('auth/js/pace.min.js') }}"></script>
<script src="{{ asset('auth/js/wow.min.js') }}"></script>
<script src="{{ asset('auth/js/jquery.scrollTo.min.js') }}"></script>

<!-- sweet alerts -->
<script src="{{ asset('auth/assets/sweet-alert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('auth/assets/sweet-alert/sweet-alert.init.js') }}"></script>
<!-- Todo -->
<script src="{{ asset('auth/js/jquery.todo.js') }}"></script>

@yield('extra-js')

<script src="{{ asset('auth/js/jquery.app.js') }}"></script>

<script>
    $(document).ready(function () {
        jQuery("#modal-toggle-view").toggle();
        jQuery('#modal-toggle-date').click(function () {
            jQuery("#modal-toggle-view").toggle("fadeIn");
        });
        $(".notify-msg").click(function () {
            var _token = $('input[name="_token"]').val();
            var data = {
                "id": $(this).data("value"),
                _token: _token
            };
            console.log(data);
            var that = $(this);
            $.ajax({
                dataType: 'json',
                method: 'post',
                url: $("#nurl").data("value"),
                data: data,
                success: function (response) {
                    if (response == 1) {
                        var newVal = $(".noti-count").data("value") - 1;
                        $(".noti-count").html(newVal).attr("data-value", newVal);
//                        console.log(response);
                        that.hide();
                    }

                },
                error: function (data) {
                    console.log(data);
                },
            });
        })
    });
    function changeProfile() {
        $('#file').click();
    }
    $('#file').change(function () {
        if ($(this).val() != '') {
            upload(this);
        }
    });
    function upload(img) {
//        console.log(img);
        var form_data = new FormData();
        form_data.append('avatar', img.files[0]);
        form_data.append('_token', '{{csrf_token()}}');
        $('#loading').css('display', 'block');
//        console.log(form_data)
        $.ajax({
            url: '{{ route('user.update') }}',
            data: form_data,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.fail) {
                    alert(data.errors['file']);
                }
                else {
                    console.log('{{asset('uploads')}}/' + data)
                    $('#file_name').val(data);
                    $('.preview_image').attr('src', data);
                }
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }</script>


</body>
</html>
