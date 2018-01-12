@extends('layout.user')

@section('title', 'dashboard')

@section('content')
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-pink">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATESURBVGhD7VldiFVVGL0VgYRlPlhSPYT9UShFSaQZ+JOphaCSD1YgvogPvihqSS/6IIQShKAoQRbhS5CQT0HqiOJbT2r2M8ggOOmdc+7Z+9w7+VDmaa096xzvzJzj3Jl7z+aOtuDj7O9nf/tbe/Y5d+89lTJQHRycGVn7Sc3aE6Exlyls00afwroXSZLcXzNmO4r+C5Kg/QeeP4TWHke719msHWQMY9WtuxAEwRMo8qSKPTVgzKtyZQisfQ2+HsWcZB+5ykFgzBIsh3PpsmhFUFgdz78x29sw2/cxTxiGT7Hg5qLpY4yLHeqTmy9XrD2L2hYzz5jgGsYAg5B+yHdjCZJfwZPLqBczPldpHGDb7XxD/l0yOzCWfehTjtz8w8SYP/FsXGs0HlOaYiBwOYSDL5epEFEUTcNMRSjkvDHmUZkzIMcy+P9xYu07MmdgH/ZlDuaSuRC1OF6h2pbJVAwEv8dgJF4gUyFIlrEoZI1Mo4Bin6ZIHQX2VXGtTNwCF4saZSpGEREuOb6szYLZ/NQlrtXmKGzcYF/mYK6R+a83Go8rzKFtImiv5PJwSXIERbyu0HGDffNyUtyYTUW3TQT6EcgNyMZmwUBbIP/iJbyE5+GJiPrehGwZmR/CMY+ojPaJYJCjmDkrdRiiOP4IxfyOmGgigr6/YbwPlG4YOCZijkotl0iZKJUIfuSehH+dcwBVa5/Fj9QqqfxKvYLYpVIrtXr9TYpUFrcUuV+WytyrkfoZqVzG69Ifz1KJYCnsgH6rWq1Olb4fesQ2gb7HoF+WymJOU6QyF3cBx6RS5/LazzZzMjf03c5XJhHtahP8ZR6R70DqI9A+DumTSv0MRSr1PsZITYs94NrI6Qo1Zk+TrxwiQRy/gPZO5wDwvZ8LfbNU7tMWhVG0Xir1Vc1Ljz7oC6Wy2M3MIZX6To6hdnlEfOJ/IsQ9S2Qgjp9Dn3eldhReiODL8jFkK3wDeP4qc9o//zwxliCn0jj4IWLtCcaRCGJv/8DhKwRb/glvbPlWaRy8EIF/Gmz7sA2fLVPH4YWID3glAt8GxH8htaPwQgQxp2A7A98tPLMtB17YXW6w1uUrdR0FP0RuF9zT39//kMyVMI7fQOxnrQrGW6GuowC/n6XF7XlfkkyR2nF4I5IiSZIH1ewovBDhDlWXebzbvSBzpV6vz0D8+7CvbVmwM8ibDC9EoF+EndeePD/skJmxB51tnIJ82akyhS8ib4NAFc/sbELwcITzxhL6WxWMOS/vdh4+v+9IWfBKhJcRiH1LakfhhQhiNsHOX/WrWGK9MvNouxj2kRdxh5Av21i2Ci9EoJ9lHO3oM0/m9JZl5EVcGFn7oUJyEQTBw0g1vVmQP0bfcom4z6y1X0ImfO9L8CVH/h9dgTmC/HsV2t0ve1ivv6iCeY00tG2x9nvZiOzyrquJpP9WgLj7Xxydn0f7KsdDLfNdkDBpiNyJBDE5iAztpgtJEJOCCMbguaaQBNE+EWs/x0A3Yf+542LML3imn/FCEkTbRPjvYNi+xqA/lSLWfoOv10sarhBtE+kW3LNE5rtgY/Zg2c7qJmFNIpJtiQqBLcMDePFOuw7dKT2sUeXeGTx24iu1BjPA+92uEdbE2lTm3YhK5T/WV5ASotpQnAAAAABJRU5ErkJggg==">
                    </i>
                    <h2 class="m-0 counter">{{ count($tasks) }}</h2>
                    <div>All Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-purple">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANPSURBVGhD7Vk9aFNRGI3WyR/UKqgIHbrooIsOirgIDopTFTMUF1FHnYq4uNZBiiAIrTgoKoKLDnZ00UE6KihIXRRim7wk994kWDWx8Xy3J6FNXtKXNHk/5R04vHe/+91zv/Ny83LfSyLGekRW6+s5rQ1Y7YQY99EpFA5SJlg4jrMtq1TFrVAvxNinlOoP0un0Vkwyhaum3QpoJPI+cagn5PP5k246rlRqFsckh3YGDHwkIjDzD8y3JI12awQa5SbNZUROgXmVrDHHOdwbqtXqRgwuymDUOcywK1DQ0JqMaP2eoZbAJzIuueA9hrwBk2znJFraMLYBpzvdmMvlDq/FCIr84KYrlOUtucgbtXMo9dwO9opGI7V2O3ZtpA1R+BvJxXlvjUCo+fuCHOnDlf1cu5JemDPmLDX/NmoiXmRfn4xo/d0mLMPc3NwWmFiQ/m4IzYeUqgMmz9k+P40I0JeEmS9yNTtgBpzOZrP7KVNHYEZ6jdhII2IjPUJkjWCaQfzoDrAZTSMo+gQK/AM+YCh6RrjD/ibauH3fZDh6RlDYpOjCxAyW1iaGo2UEemdQ2CKOvxxjDjBsERkjkB2EXspqGnOD4ToiYwQFvRA98K08IjBcRySMQCdZ04buEMMr4LsRPFQdSpdKe9lcFZlSaR+KybGoyww3wVcjhUJhN4TLuOPMZ5Q6wnBLyBJC/rTogK8ZdoWvRqQwxF5JHDSOUqfY5QoYvmY1sH2fLxb3MOwK35eW3PsRfyx9KHQBE42wawUgM4yc2lPfeYZbIpAvu10yWk9wogp4hV0W6B9A/zvpB58w3BaBGKkhr/UtTLQolHOGZUmNcewPpdQOhtsiUCMCFH0Vk9nXp8idkFdFaP8Wc2ifZtqqCNyIAJONSPGSD9rvBQzeZ7cnhMKIQO5gyF96O6/U11QqtZldnhAaIwJH66Mw8RN7qWMMeUaojAjkLweedoTQGekWsZFGxEZ6hNhII9a/EaUcHC/2m5jnDo79M+I3e25Ethhov/SbtV00zrszYv+FWroqRYYCRd6YSzTyjCHvwCD7KhOfyl0cXdeyTxzFnm0GR6nlNsvzDhi5AJZFIBRUatYYs4vldQbuYMdhaCpATqKGMa9PlzHCgUTiP2xVg6A48iymAAAAAElFTkSuQmCC">
                    </i>
                    <h2 class="m-0 counter">{{ count($tasks->where('status', 'complete')) }}</h2>
                    <div>Completed Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-info">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATESURBVGhD7VldiFVVGL0VgYRlPlhSPYT9UShFSaQZ+JOphaCSD1YgvogPvihqSS/6IIQShKAoQRbhS5CQT0HqiOJbT2r2M8ggOOmdc+7Z+9w7+VDmaa096xzvzJzj3Jl7z+aOtuDj7O9nf/tbe/Y5d+89lTJQHRycGVn7Sc3aE6Exlyls00afwroXSZLcXzNmO4r+C5Kg/QeeP4TWHke719msHWQMY9WtuxAEwRMo8qSKPTVgzKtyZQisfQ2+HsWcZB+5ykFgzBIsh3PpsmhFUFgdz78x29sw2/cxTxiGT7Hg5qLpY4yLHeqTmy9XrD2L2hYzz5jgGsYAg5B+yHdjCZJfwZPLqBczPldpHGDb7XxD/l0yOzCWfehTjtz8w8SYP/FsXGs0HlOaYiBwOYSDL5epEFEUTcNMRSjkvDHmUZkzIMcy+P9xYu07MmdgH/ZlDuaSuRC1OF6h2pbJVAwEv8dgJF4gUyFIlrEoZI1Mo4Bin6ZIHQX2VXGtTNwCF4saZSpGEREuOb6szYLZ/NQlrtXmKGzcYF/mYK6R+a83Go8rzKFtImiv5PJwSXIERbyu0HGDffNyUtyYTUW3TQT6EcgNyMZmwUBbIP/iJbyE5+GJiPrehGwZmR/CMY+ojPaJYJCjmDkrdRiiOP4IxfyOmGgigr6/YbwPlG4YOCZijkotl0iZKJUIfuSehH+dcwBVa5/Fj9QqqfxKvYLYpVIrtXr9TYpUFrcUuV+WytyrkfoZqVzG69Ifz1KJYCnsgH6rWq1Olb4fesQ2gb7HoF+WymJOU6QyF3cBx6RS5/LazzZzMjf03c5XJhHtahP8ZR6R70DqI9A+DumTSv0MRSr1PsZITYs94NrI6Qo1Zk+TrxwiQRy/gPZO5wDwvZ8LfbNU7tMWhVG0Xir1Vc1Ljz7oC6Wy2M3MIZX6To6hdnlEfOJ/IsQ9S2Qgjp9Dn3eldhReiODL8jFkK3wDeP4qc9o//zwxliCn0jj4IWLtCcaRCGJv/8DhKwRb/glvbPlWaRy8EIF/Gmz7sA2fLVPH4YWID3glAt8GxH8htaPwQgQxp2A7A98tPLMtB17YXW6w1uUrdR0FP0RuF9zT39//kMyVMI7fQOxnrQrGW6GuowC/n6XF7XlfkkyR2nF4I5IiSZIH1ewovBDhDlWXebzbvSBzpV6vz0D8+7CvbVmwM8ibDC9EoF+EndeePD/skJmxB51tnIJ82akyhS8ib4NAFc/sbELwcITzxhL6WxWMOS/vdh4+v+9IWfBKhJcRiH1LakfhhQhiNsHOX/WrWGK9MvNouxj2kRdxh5Av21i2Ci9EoJ9lHO3oM0/m9JZl5EVcGFn7oUJyEQTBw0g1vVmQP0bfcom4z6y1X0ImfO9L8CVH/h9dgTmC/HsV2t0ve1ivv6iCeY00tG2x9nvZiOzyrquJpP9WgLj7Xxydn0f7KsdDLfNdkDBpiNyJBDE5iAztpgtJEJOCCMbguaaQBNE+EWs/x0A3Yf+542LML3imn/FCEkTbRPjvYNi+xqA/lSLWfoOv10sarhBtE+kW3LNE5rtgY/Zg2c7qJmFNIpJtiQqBLcMDePFOuw7dKT2sUeXeGTx24iu1BjPA+92uEdbE2lTm3YhK5T/WV5ASotpQnAAAAABJRU5ErkJggg==">
                    </i>
                    <h2 class="m-0 counter">{{ count($tasks->where('status', 'pending')) }}</h2>
                    <div>Pending Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-success">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAALbSURBVGhD7Zm/axRBFMcvFoq/UNHCRhtBsBCxEBv/gaCNoojBP8FabLQRCVZBBFFipzYKVhb2KbQRRAgoouDBcV72dufNJuCPnHd+3+Tdsdnsxb3d2Z0V9gtfZmfmzZv32dsNc5dGrYi6RNdg5RMNJjHWvF/S+qikcSvP83Z3lVpNKjSNsfaJpCpGnU5nFzZ5mPZOI+6DLE2lIAjOJOWJGzX0faU+ob0oSycTCpuXRH/gYKyJyMRlBEGO1Q05I0bMssT1ulqfluXpNBgMtmBxyItR5xEZThQKOpwLhGhBhsYKdcxyLDwnQ+mETfbIJsR9gE3hcl+Sfd8/ngcEj82bpLxsfrw5FnEzZg+lnpnFaRUHGfY3c2aQTYzCX3Esru2CINHG9wUxPIc7uzi8k2nsaz0tOX/Hc2J8+F4UBEL0zQRE1G63dwLiB89nMXLOS6qRAHnWzJUJwsLcZfkTue7O/sMe/Brv2CFJM5IzENuqQeKqQSypBomrDJDOysrBZrO5Xbrr9F+AdMPwGB9LpLCf8KxMjVR5EOQ5gWKWOFfMVyTEqNIgUQi0X7iN+IWEGVUWJAoBv+z3+9vQzkmf/VhCjSoJEofAV4KtPI735LYU90spddIEiyoHkgYCPm+CI6oUSFYIVmVA8kCwKgGSF4LlHMQGBMspiC0IljMQmxAsJyDynf07z8O5IVhOQAKtz/Ec/M4GBMsJCIq+J3O3+FiO/h3ZNBMEyxXIIs+h/Qibn4XyQLBKBwnD8ACPD42NeoB5i0KmJSSTSgfBOzGFwu9jgwfwBRz+9spULjl5tIpQDRJXDWJJNUhcY0GU8tBeKtrYx/yrrTCQsm0dpNVq7UD/edkOiG7w/rjOBmJOtGt3ZVmGnAoH06sC8lSG0gufxlezmOgu2sRnuSTP4PSw9hMr0U0pL704Ce5AjxNUwkp91lrvl/Imk0d0ij8RAD1yaUBct3WOq1VrIjUafwFbHieiQuf04QAAAABJRU5ErkJggg==">
                    </i>
                    <h2 class="m-0 counter">{{ count($tasks->where('status', 'ongoing')) }}</h2>
                    <div>Ongoing Task</div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">

                <!-- TODO -->
                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Pending Task ({{ count($tasks->where('status', 'pending')) }})

                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-5" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <p class="help-block">Check to assign to self</p>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet-5" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <ul class="list-group no-margn nicescroll todo-list" style="max-height: 275px;" id="todo-list">
                                {{ csrf_field() }}
                                <input type="hidden" data-url="{{ route('task.assign') }}" id="turl">
                                @foreach($tasks->where('status', 'pending') as $task)
                                    <li class="list-group-item" id="task-{{ $task->id }}">
                                        <label class="cr-styled">
                                            <input type="checkbox" data-value="{{ $task->id }}" class="task-assign">
                                            <i class="fa"></i>
                                        </label>
                                        <span class="todo-text">{{ $task->title }}</span>
                                        <span class="todo-date pull-right">{{ $task->end_date }}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-6">

                <!-- TODO -->
                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Ongoing Task ({{ count($tasks->where('status', 'ongoing')) }})
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-5" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <p class="help-block">Check to complete task</p>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet-5" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <ul class="list-group no-margn nicescroll todo-list" style="max-height: 275px;" id="todo-list">
                                {{ csrf_field() }}
                                <input type="hidden" data-url="{{ route('task.complete') }}" id="tcurl">
                                @foreach($tasks->where('status', 'ongoing') as $task)
                                    <li class="list-group-item" id="task-complete-{{ $task->id }}">
                                        <label class="cr-styled">
                                            <input type="checkbox" data-value="{{ $task->id }}" class="task-complete">
                                            <i class="fa"></i>
                                        </label>
                                        <span class="todo-text">{{ $task->title }}</span>
                                        <span class="todo-date pull-right">{{ $task->end_date }}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-lg-6">

                <!-- Chat -->
                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Chat
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-3"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet-3" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div class="chat-conversation">
                                <ul class="conversation-list nicescroll">
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="img/avatar-2.jpg" alt="male">
                                            <i>10:00</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>John Deo</i>
                                                <p>
                                                    Hello!
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="img/avatar-3.jpg" alt="Female">
                                            <i>10:01</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Smith</i>
                                                <p>
                                                    Hi, How are you? What about our next meeting?
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="chat-avatar">
                                            <img src="img/avatar-2.jpg" alt="male">
                                            <i>10:01</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>John Deo</i>
                                                <p>
                                                    Yeah everything is fine
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="clearfix odd">
                                        <div class="chat-avatar">
                                            <img src="img/avatar-3.jpg" alt="male">
                                            <i>10:02</i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i>Smith</i>
                                                <p>
                                                    Wow that's great
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-xs-9 chat-inputbar">
                                        <input type="text" class="form-control chat-input" placeholder="Enter your text">
                                    </div>
                                    <div class="col-xs-3 chat-send">
                                        <button type="submit" class="btn btn-info">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end Chat -->
            </div> <!-- end col-->--}}

        </div> <!-- End row -->

    </div>
@endsection

@section('extra-js')
    @include('include.drift-widget')
    <script src="{{ asset('auth/js/jquery.nicescroll.js') }}"></script>

    <script src="{{ asset('auth/assets/chat/moment-2.2.1.js') }}"></script>

    <!-- Counter-up -->
    <script src="{{ asset('auth/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery.counterup.min.js') }}"></script>

    <!-- sparkline -->
    <script src="{{ asset('auth/assets/sparkline-chart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('auth/assets/sparkline-chart/chart-sparkline.js') }}"></script>

    <script>
        /* ==============================================
         Counter Up
         =============================================== */
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".task-assign").click(function () {
                var _token = $('input[name="_token"]').val();
                tid = $(this).data("value");
                var data = {
                    "id": tid,
                    _token : _token
                };
                var that = $(this);
                $.ajax({
                    dataType: 'json',
                    method: 'post',
                    url: $("#turl").data("url"),
                    data: data,
                    success: function(response){
                        if (response == 1){
                            $("#task-"+tid).hide();
                        }
                    },
                    error: function(data){
                        console.log(data);
                    },
                });
            });

            $(".task-complete").click(function () {
                var _token = $('input[name="_token"]').val();
                tid = $(this).data("value");
                var data = {
                    "id": tid,
                    _token : _token
                };
                var that = $(this);
                $.ajax({
                    dataType: 'json',
                    method: 'post',
                    url: $("#tcurl").data("url"),
                    data: data,
                    success: function(response){
                        if (response == 1){
                            $("#task-complete-"+tid).hide();
                        }
                    },
                    error: function(data){
                        console.log(data);
                    },
                });
            });
        });


    </script>
@endsection
