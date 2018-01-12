@extends('layout.user')

@section('title', 'profile')

@section('content')
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div {{--class="bg-picture" style="background-image:url('{{ Auth::user()->avatar }}')"--}}>
                    <span class="bg-picture-overlay"></span>

                    <!-- meta -->
                    <div class="box-layout meta bottom">
                        <div class="col-sm-6 clearfix">
                            <span class="img-wrapper pull-left m-r-15" style="">
                                {{--<img src="{{ Auth::user()->avatar }}" style="width:64px" class="br-radius">--}}
                                <img src="{{ Auth::user()->avatar }}" style="width:200px" class="br-radius">
                            </span>
                            <div class="media-body">
                                <h3 class="mb-2 m-t-10 ellipsis">{{ Auth::user()->name }}</h3>
                                <h5 class=""> {{ Auth::user()->email }}</h5>
                            </div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
        </div>

        <div class="row m-t-30">
            @if (Session::has('message'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="help-block">
                        {{ Session::get('message') }}
                    </span>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span class="help-block">
                        {{ Session::get('error') }}
                    </span>
                </div>
            @endif
                @if ($errors->has('name') || $errors->has('phone'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Error!</h4>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                @endif

            <div class="col-sm-12">
                <div class="panel panel-default p-0">
                    <div class="panel-body p-0">
                        <ul class="nav nav-tabs profile-tabs">
                            <li class="active" id="about-Me"><a data-toggle="tab" href="#aboutme">About Me</a></li>
                            <li class="" id="edit-page"><a data-toggle="tab" href="#edit-profile">Settings</a></li>
                            @if(Auth::user()->role != 'assistant')
                                <li class=""><a data-toggle="tab" href="#projects">Tasks</a></li>
                            @endif

                        </ul>

                        <div class="tab-content m-0">

                            <div id="aboutme" class="tab-pane active">
                                <div class="profile-desk">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h1>{{ Auth::user()->name }}</h1>
                                            <span class="designation">{{ Auth::user()->email }}</span>
                                        </div>
                                        <div class="col-sm-6 pointer text-right">
                                            <i id="editProfile">
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATXSURBVGhD7Vl9iBVVFN8+kYoy8COhgvqvDMIEKaUgI/qEor+i/pPKCELCEARlA0VD+kBIsigIiqCHsL2Ze++859z7Jo3+ENbKP1RQ1MQPFDFB0XV1P/qd2TPz7rx9676ZN7Nvl94PDm+558w553fm3nPvne3poosuisfo6OhNQvgPS1lbJqV+yfH8p3zfv4fV0x9K6UeFMl8LaU7hd7RBhoXS/a7UaxwnmMOPTC+UguAuJPktkrzehEAT0Vfw+1lfXzCbXXQejuM/iDewrzFZkLqG35OuMgeQ+MVG/Zjoc5h67/T29t7M7joDmvdC6sOJ5KT+W0rzlr0mgiC4VQjzDAj/5EpzNWE/9oxWKrifzaceqLaKksEbGEGS6yerbrVanQfbbY3TEM+eF555g82mDsKrvZJMRK9iVUsIG4PUvzX4GMF021QqlW5hs+KBabInTkDpX3k4FejtIfnVkAGbEAhKaiBsVhzCBW4HFjsfYVUmuBXzOApzNOFTmr1CBPexSTHAfH7XCriPh9sC7S1Yc7UkGX2YisYm+QNTYUMUDKS+4+G20d/ffxsK84NNBrGOlavVh9gkX8D5N1agzTycC+h4g+L4NhnIIWrhbJIfkPzWKAj+3sbDuUB4eiX8DkX+IYOO1K+zOl/A+UdxIGkCHm4L1HJRlC2x3zG5jHXzMpvkDzrNRsEQ/DptcqzKBCF+vxcLu2IRIDmD3f5JNikG1P8R6KQV9HNWpYYQ+lnsQ/9YvqiB/NlXqTzAJsUCAT+uB9bXcL5azqqWEJ6YpfkSz+N4XyeBsRLe8J1sFsN1g8cQZzNI/0Lr0vVqL7CqPaCLzELgQ/Uk9AWcZJ9n9YQId3NlViCZ0/VnQxnCm1hPXYtNY2B8LfRJwhCQ2oG1dTubZYcQtcVweDl2jPVC1Wq2iYUnZWU+xFo4GNlbzx2j2ySbJgBdvGc1E+i3sml7wJX2Rb4o2c5HMEX2opI/QrZDaF+ICVsyjLfzlVLqbnaXwDgSdIzxzDoUQ1vjg7ldo6mLIdnx94wbCJI8QW+UXYxDIwn4318u6/mk4xNA/TqNhhE+lBU037FZvQ9ndgdrXdBylfIXsbsYNyJB4PV5JrZphwi1RySSuE9EgkRO0wEQCYxNLRzzUcE9GKfrb6P9MGw+iRb5ZCTCjROdy7LJPrWoighw1nJG1b2EJLa4Fb2kWech0McGugYjkT8Sz0KY7KeJsclJUNG+YHU6OJ5+As7+TToz29PeHbA+XoOfxEZoSyskULxqpvar1O65cHA8coRqDLjKf5vVqUF3kIYOxH5bI+E4zh1skg5IXFjOBh1Ve45VmUF3dMtn8SSk9F9NOFO191iVGUh6o+2zcBJ82dkfB1TGZVVmZCGBuDszkyC4nn7acjhU9sxCVmVCR0gQ8Dq/j51KXebhTOgYCQKSjz+LwukKHk6NjpKgQLZjz9u1gFWp0FESBD6qc3A9wMOpQB0ukeBUkyDQZclyfoSHUwFJ7oh9dIIEITwy08cByET3hslABYiStD/tTBmJPBAWwUo0WmMzigSBjjFxotKcR/Jv0okVv3/NGBIEJBl/bZlIpj0JAqr/c7PkI5kRJAiJzZRuiPR/j/CkUPtACLMUa6X9zzlFgyodJu3plXQhmxFJd9HF/wI9Pf8BRsil8D2bvQYAAAAASUVORK5CYII=">
                                            </i>
                                        </div>
                                    </div>

                                    <table class="table table-condensed m-t-20">
                                        <thead>
                                        <tr>
                                            <th colspan="2"><span class="h4">Contact Information</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(Auth::user()->name)
                                            <tr>
                                                <td><b>Full Name</b></td>
                                                <td class="ng-binding">{{ Auth::user()->name }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td><b>Email</b></td>
                                            <td>
                                                <a href="mailto:{{ Auth::user()->email }}" class="ng-binding">
                                                    {{ Auth::user()->email }}
                                                </a></td>
                                        </tr>
                                        @if(Auth::user()->phone)
                                            <tr>
                                                <td><b>Phone</b></td>
                                                <td class="ng-binding">{{ Auth::user()->phone }}</td>
                                            </tr>
                                        @endif
                                        @if(Auth::user()->bio)<p>
                                            <tr>
                                                <td><b>About</b></td>
                                                <td class="ng-binding">{{ Auth::user()->bio }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->

                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane">
                                <div class="user-profile-content">
                                    <form role="form" method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="FullName">Full Name</label>
                                            <input type="text" name="name" min="3" value="{{ Auth::user()->name }}" id="FullName" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Phone</label>
                                            <input type="text" name="phone" required value="{{ Auth::user()->phone }}" placeholder="080********" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" required value="{{ Auth::user()->email }}" id="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="RePassword">Re-Password</label>
                                            <input type="password" name="confirm" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">About Me</label>
                                            <textarea name="bio" style="height: 125px;" id="AboutMe" class="form-control">{{ Auth::user()->bio }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Profile Image</label>
                                            <input type="file" name="avatar" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>

                            <!-- profile -->
                            @if(Auth::user()->role != 'assistant')
                                <div id="projects" class="tab-pane">
                                    <div class="row m-t-10">
                                        <div class="col-md-12">
                                            <div class="portlet"><!-- /primary heading -->
                                                <div id="portlet2" class="panel-collapse collapse in">
                                                    <div class="portlet-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Task title</th>
                                                                    <th>Start Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach(Auth::user()->task as $key => $task)
                                                                    <tr>
                                                                        <td>{{ ++$key }}</td>
                                                                        <td>{{ $task->title }}</td>
                                                                        <td>{{ $task->created_at->format('Y-m-j') }}</td>
                                                                        <td>{{ $task->end_date }}</td>
                                                                        <td>
                                                                            @if($task->status == 'pending')
                                                                                <span class="label label-danger">
                                                                                {{ $task->status }}
                                                                            </span>
                                                                            @elseif($task->status == 'ongoing')
                                                                                <span class="label label-info">
                                                                                {{ $task->status }}
                                                                            </span>
                                                                            @elseif($task->status == 'complete')
                                                                                <span class="label label-success">
                                                                                {{ $task->status }}
                                                                            </span>
                                                                            @endif

                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /Portlet -->
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-js')
    <script>
        jQuery(document).ready(function($) {

            jQuery('#editProfile').click(function () {
                jQuery('#about-Me').removeClass("active");
                jQuery('#aboutme').removeClass("active");

                var d = document.getElementById("edit-page");
                d.className += " active";

                var e = document.getElementById("edit-profile");
                e.className += " active";
//                jQuery('ul.profile-tabs li').removeClass("active");

//                jQuery(this).addClass("active");
//                jQuery('#edit-page').trigger('click');
                console.log('clk');
            });

        });
    </script>
@endsection