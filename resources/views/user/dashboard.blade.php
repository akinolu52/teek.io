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
                    <h2 class="m-0 counter">{{ count(Auth::user()->task) }}</h2>
                    <div>All Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-purple">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANPSURBVGhD7Vk9aFNRGI3WyR/UKqgIHbrooIsOirgIDopTFTMUF1FHnYq4uNZBiiAIrTgoKoKLDnZ00UE6KihIXRRim7wk994kWDWx8Xy3J6FNXtKXNHk/5R04vHe/+91zv/Ny83LfSyLGekRW6+s5rQ1Y7YQY99EpFA5SJlg4jrMtq1TFrVAvxNinlOoP0un0Vkwyhaum3QpoJPI+cagn5PP5k246rlRqFsckh3YGDHwkIjDzD8y3JI12awQa5SbNZUROgXmVrDHHOdwbqtXqRgwuymDUOcywK1DQ0JqMaP2eoZbAJzIuueA9hrwBk2znJFraMLYBpzvdmMvlDq/FCIr84KYrlOUtucgbtXMo9dwO9opGI7V2O3ZtpA1R+BvJxXlvjUCo+fuCHOnDlf1cu5JemDPmLDX/NmoiXmRfn4xo/d0mLMPc3NwWmFiQ/m4IzYeUqgMmz9k+P40I0JeEmS9yNTtgBpzOZrP7KVNHYEZ6jdhII2IjPUJkjWCaQfzoDrAZTSMo+gQK/AM+YCh6RrjD/ibauH3fZDh6RlDYpOjCxAyW1iaGo2UEemdQ2CKOvxxjDjBsERkjkB2EXspqGnOD4ToiYwQFvRA98K08IjBcRySMQCdZ04buEMMr4LsRPFQdSpdKe9lcFZlSaR+KybGoyww3wVcjhUJhN4TLuOPMZ5Q6wnBLyBJC/rTogK8ZdoWvRqQwxF5JHDSOUqfY5QoYvmY1sH2fLxb3MOwK35eW3PsRfyx9KHQBE42wawUgM4yc2lPfeYZbIpAvu10yWk9wogp4hV0W6B9A/zvpB58w3BaBGKkhr/UtTLQolHOGZUmNcewPpdQOhtsiUCMCFH0Vk9nXp8idkFdFaP8Wc2ifZtqqCNyIAJONSPGSD9rvBQzeZ7cnhMKIQO5gyF96O6/U11QqtZldnhAaIwJH66Mw8RN7qWMMeUaojAjkLweedoTQGekWsZFGxEZ6hNhII9a/EaUcHC/2m5jnDo79M+I3e25Ethhov/SbtV00zrszYv+FWroqRYYCRd6YSzTyjCHvwCD7KhOfyl0cXdeyTxzFnm0GR6nlNsvzDhi5AJZFIBRUatYYs4vldQbuYMdhaCpATqKGMa9PlzHCgUTiP2xVg6A48iymAAAAAElFTkSuQmCC">
                    </i>
                    <h2 class="m-0 counter">
                        {{ count(Auth::user()->task->where('status', 'complete')) }}
                    </h2>
                    <div>Completed Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-info">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATESURBVGhD7VldiFVVGL0VgYRlPlhSPYT9UShFSaQZ+JOphaCSD1YgvogPvihqSS/6IIQShKAoQRbhS5CQT0HqiOJbT2r2M8ggOOmdc+7Z+9w7+VDmaa096xzvzJzj3Jl7z+aOtuDj7O9nf/tbe/Y5d+89lTJQHRycGVn7Sc3aE6Exlyls00afwroXSZLcXzNmO4r+C5Kg/QeeP4TWHke719msHWQMY9WtuxAEwRMo8qSKPTVgzKtyZQisfQ2+HsWcZB+5ykFgzBIsh3PpsmhFUFgdz78x29sw2/cxTxiGT7Hg5qLpY4yLHeqTmy9XrD2L2hYzz5jgGsYAg5B+yHdjCZJfwZPLqBczPldpHGDb7XxD/l0yOzCWfehTjtz8w8SYP/FsXGs0HlOaYiBwOYSDL5epEFEUTcNMRSjkvDHmUZkzIMcy+P9xYu07MmdgH/ZlDuaSuRC1OF6h2pbJVAwEv8dgJF4gUyFIlrEoZI1Mo4Bin6ZIHQX2VXGtTNwCF4saZSpGEREuOb6szYLZ/NQlrtXmKGzcYF/mYK6R+a83Go8rzKFtImiv5PJwSXIERbyu0HGDffNyUtyYTUW3TQT6EcgNyMZmwUBbIP/iJbyE5+GJiPrehGwZmR/CMY+ojPaJYJCjmDkrdRiiOP4IxfyOmGgigr6/YbwPlG4YOCZijkotl0iZKJUIfuSehH+dcwBVa5/Fj9QqqfxKvYLYpVIrtXr9TYpUFrcUuV+WytyrkfoZqVzG69Ifz1KJYCnsgH6rWq1Olb4fesQ2gb7HoF+WymJOU6QyF3cBx6RS5/LazzZzMjf03c5XJhHtahP8ZR6R70DqI9A+DumTSv0MRSr1PsZITYs94NrI6Qo1Zk+TrxwiQRy/gPZO5wDwvZ8LfbNU7tMWhVG0Xir1Vc1Ljz7oC6Wy2M3MIZX6To6hdnlEfOJ/IsQ9S2Qgjp9Dn3eldhReiODL8jFkK3wDeP4qc9o//zwxliCn0jj4IWLtCcaRCGJv/8DhKwRb/glvbPlWaRy8EIF/Gmz7sA2fLVPH4YWID3glAt8GxH8htaPwQgQxp2A7A98tPLMtB17YXW6w1uUrdR0FP0RuF9zT39//kMyVMI7fQOxnrQrGW6GuowC/n6XF7XlfkkyR2nF4I5IiSZIH1ewovBDhDlWXebzbvSBzpV6vz0D8+7CvbVmwM8ibDC9EoF+EndeePD/skJmxB51tnIJ82akyhS8ib4NAFc/sbELwcITzxhL6WxWMOS/vdh4+v+9IWfBKhJcRiH1LakfhhQhiNsHOX/WrWGK9MvNouxj2kRdxh5Av21i2Ci9EoJ9lHO3oM0/m9JZl5EVcGFn7oUJyEQTBw0g1vVmQP0bfcom4z6y1X0ImfO9L8CVH/h9dgTmC/HsV2t0ve1ivv6iCeY00tG2x9nvZiOzyrquJpP9WgLj7Xxydn0f7KsdDLfNdkDBpiNyJBDE5iAztpgtJEJOCCMbguaaQBNE+EWs/x0A3Yf+542LML3imn/FCEkTbRPjvYNi+xqA/lSLWfoOv10sarhBtE+kW3LNE5rtgY/Zg2c7qJmFNIpJtiQqBLcMDePFOuw7dKT2sUeXeGTx24iu1BjPA+92uEdbE2lTm3YhK5T/WV5ASotpQnAAAAABJRU5ErkJggg==">
                    </i>
                    <h2 class="m-0 counter">
                        {{ count(Auth::user()->task->where('status', 'pending')) }}
                    </h2>
                    <div>Pending Task</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget-panel widget-style-2 bg-success">
                    <i>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAALbSURBVGhD7Zm/axRBFMcvFoq/UNHCRhtBsBCxEBv/gaCNoojBP8FabLQRCVZBBFFipzYKVhb2KbQRRAgoouDBcV72dufNJuCPnHd+3+Tdsdnsxb3d2Z0V9gtfZmfmzZv32dsNc5dGrYi6RNdg5RMNJjHWvF/S+qikcSvP83Z3lVpNKjSNsfaJpCpGnU5nFzZ5mPZOI+6DLE2lIAjOJOWJGzX0faU+ob0oSycTCpuXRH/gYKyJyMRlBEGO1Q05I0bMssT1ulqfluXpNBgMtmBxyItR5xEZThQKOpwLhGhBhsYKdcxyLDwnQ+mETfbIJsR9gE3hcl+Sfd8/ngcEj82bpLxsfrw5FnEzZg+lnpnFaRUHGfY3c2aQTYzCX3Esru2CINHG9wUxPIc7uzi8k2nsaz0tOX/Hc2J8+F4UBEL0zQRE1G63dwLiB89nMXLOS6qRAHnWzJUJwsLcZfkTue7O/sMe/Brv2CFJM5IzENuqQeKqQSypBomrDJDOysrBZrO5Xbrr9F+AdMPwGB9LpLCf8KxMjVR5EOQ5gWKWOFfMVyTEqNIgUQi0X7iN+IWEGVUWJAoBv+z3+9vQzkmf/VhCjSoJEofAV4KtPI735LYU90spddIEiyoHkgYCPm+CI6oUSFYIVmVA8kCwKgGSF4LlHMQGBMspiC0IljMQmxAsJyDynf07z8O5IVhOQAKtz/Ec/M4GBMsJCIq+J3O3+FiO/h3ZNBMEyxXIIs+h/Qibn4XyQLBKBwnD8ACPD42NeoB5i0KmJSSTSgfBOzGFwu9jgwfwBRz+9spULjl5tIpQDRJXDWJJNUhcY0GU8tBeKtrYx/yrrTCQsm0dpNVq7UD/edkOiG7w/rjOBmJOtGt3ZVmGnAoH06sC8lSG0gufxlezmOgu2sRnuSTP4PSw9hMr0U0pL704Ce5AjxNUwkp91lrvl/Imk0d0ij8RAD1yaUBct3WOq1VrIjUafwFbHieiQuf04QAAAABJRU5ErkJggg==">
                    </i>
                    <h2 class="m-0 counter">
                        {{ count(Auth::user()->task->where('status', 'ongoing')) }}
                    </h2>
                    <div>Ongoing Task</div>
                </div>
            </div>
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">

                <!-- TODO -->
                <div class="portlet" id="todo-container"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Task
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet-5" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet-5" class="panel-collapse collapse in">
                        <div class="portlet-body todoapp">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4>
                                </div>
                                {{--<div class="col-sm-6">
                                    <a href="" class="pull-right btn btn-primary btn-sm" id="btn-archive">Archive</a>
                                </div>--}}
                            </div>

                            <ul class="list-group no-margn nicescroll todo-list" style="max-height: 275px;" id="todo-list"></ul>

                            <form name="todo-form" id="todo-form" class="m-t-20">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-sm-12 form-group todo-inputbar">
                                        <label>Name</label>
                                        <input type="text" id="todo-input-text" name="title" class="form-control" placeholder="Name of the task">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 form-group todo-inputbar">
                                        <label>Description</label>
                                        <textarea name="description" id="todo-description" cols="10" rows="1" class="form-control autogrow" placeholder="Description of the task" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    </div>
                                </div>
                                <div class="row todo-inputbar ">
                                    <div class="col-sm-4 form-group  pointer" title="Add end date" style="margin-top: 1px;" id="todo-toggle-date">
                                        <i>
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPpSURBVGhD7VlJaxRBFB5JXBHc0ZnpnkFR0JzEeHS5qLiAIgjqyZMRFEz+gF4UVPQaMYh6mu6eFtwNenHwHiFICCFTNWOiSUBFQTFRDBm/KgttJs/O9FIzEPzgY5au9973ql7X0p34j9mKpMszqTw7YTi8CyykHTZq2PwLvlcMm03i9yd8DqQd/gDfL6Ycviv5aGSRMm8sjPzw8rTN2tM275GCAxK240gqZ1jFvYlKZY5yWz8kcwMrIf7Knx6PgzbrTVv8SH0SQpB0vnQSgT9MExIfC1m7vElFjB+pe/0rDIc9IQLHTpTbBMquTYWOD8lceSOSeEMF1UkkcytRKDQrGdFgWmwr7oWPVKD6kD1ucfvmKTnhkMkPtiCJ93SAepK5CbfSpGQFw+97gg9Pd9oYosyuKWkBgNmpXjd2zbTZlGmVDiqFtUFNsbTDAMRa8wMrOccsNEJdD0xR5liElUx/yJKK6eZGObwWPk2Xb6Ouh6LNb0ihM0Gu2JSDENSTCPZtObZBiv0XxLAh46+kgxDUkggo1xc/pC12ljIMS22JYOXP3i8vlaIpYDReUYZhqSsRQfimtzDiPEEZRKHORMBuKbwa6lBEGYSm1kRwhGjt6pkrxXuBi+JkRxuFpOYRqSSd4hYp3gsEfUk1jkLdiRh5dlyK9wLrxzuycQRqT8Rm56R4L0TNkY2rKLcdOKPXRIc7wnfKLW8mr9MsUnEpoqOmbySphiRtNqRMtABr2QEyLkGsJ9eV2V9gRH5SjauJXhjLuKy1JuI8I3yvcvsWk9cJwn87FZci2nZK8V7gz89U4yiET733iMMuSfFeYJj66cbhqTsRMXpSvBdI5CHVOAq1J+Kw/VK8F5gtLlCNo1B3ImJbJcV7YVp8N9U4CnUmIk6eUng1cBZZiKn1G2UUllpHxO+kiPKySKOQ1JpIvrRTiqZg2qU9pFFI6koEfkv+D7vFYyCb9VLGYahxRE5LvX4Qj/YJw1DUlMjb7J3yAinWF3JU+AvCQWCKEhBvpjDfd1DXw5EdU0pnhng/ARHjtKPGER3yXEmsHTA6RTlrFKFndK3FVyt5wYBRuUk5rTdldfhNtzPCrTShJ2LfgwWizSYDP7ymsL57cD5usLtkEM1EJ04YFjuspMQAMTI4VqJ3pqiAOoh4Y6bNtysF8cK0i4cwNWt/g4UknmXd8hoVVg8yuaFlYsMmapcSEYUopRF01lEVqj4Qj/axybwNfqdEBSESKBsWP1Pbiq0J61y+BKXQhlF6Ctb8SgLnCYbPLsMp7fDfADYChUKzeIwpngCi9M6jp68KsUi0E5+X8bsD3/el7KKpLP5jliKR+AU3iab4xlMMUwAAAABJRU5ErkJggg==">
                                        </i>
                                        <small class="username">Add end date</small>
                                    </div>
                                    <div class="col-sm-8 form-group p-t-10" id="todo-toggle-view">
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="todo-input-date" name="edate" title="Enter date of completion">
                                    </div>
                                </div>
                                <div class="row form-group right">
                                    <div class="col-sm-3 col-sm-offset-9 todo-send">
                                        <button class="btn-info btn-block btn" type="button" id="todo-btn-submit">Add Task</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

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
                    <input type="hidden" data-value="{{ Auth::user()->name }}" id="chat-user">
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
        </div>--}} <!-- end col-->
            {{--</div>

            <div class="row">--}}
            <div class="col-lg-6">
                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Weekly Task Report
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" id="weeklyDataUrl" data-value="{{ route('task.weeklyChart') }}">
                        <input type="hidden" id="yearlyDataUrl" data-value="{{ route('task.yearlyChart') }}">
                    </div>
                    <div id="portlet1" class="panel-collapse collapse in">
                        <div class="portlet-body morris-bar-container">
                            <div id="no-weekly-data" class="text-center">
                                <div class="portlet-body" style="margin-bottom: 50px;">
                                    <h2 class="p-t-0">
                                        No task Yet
                                    </h2>
                                    <img style="width: 150px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGrSURBVHhe7doxahtRFIZRQdIEAiGdIWWKLCApXLh05wU5O8harDIajYqRPIXB27LJ8Jp7GV6n4ULOB3/3xC2OytlJkiRJ+q96enr9NAwvX7faPM8f22mtdTie/wzj5W2r/R2nu3ZaawEpFpBiASkWkGIBKRaQYgEpFpBiASkWkGIBKRaQYgEpFpBiASkWkGIBKRaQYgEpFpBiASkWkGIBKVY5kH9f0g2n6X6rHY/zr3a6ROVApmn6svbDq+14eWmnSwQECJBeQIAA6QUECJBeQIAA6QUECJBeQIAA6QUECJBeQIAA6QUECJBeQIAA6QUkgYzj5fthPD9utXGcb9vpJSAJZDg9P6y+u95+t9NLQIAASQMSBgRIGpAwIEDSgIQBAZIGJAwIkDQgYUCApAEJAwIkDUgYECBpQMKAAEkDEgYESBqQMCBA0oCEAQGSBiQMCJA0IGFAgKQBCQMCJA1IGBAgaUDCgABJAxIGBEgakDAgQNKAhAEBkgYkDAiQtNog+/3+wzA8/9xqp9PlRzu9tPwhVt5db/NNO710OJy/rb+7zvbz/Lmdbu127zM+qfFLCJzWAAAAAElFTkSuQmCC">
                                </div>
                            </div>

                            <div id="morris-bar-example" style="height: 320px;"></div>
                        </div>
                    </div>
                </div> <!-- /Portlet -->
            </div> <!-- end col -->
        </div>
        <div class="row">
            <div class="col-lg-6" >
                <div class="portlet"><!-- /primary heading -->
                    <div class="portlet-heading">
                        <h3 class="portlet-title text-dark text-uppercase">
                            Monthly Task Report
                        </h3>
                        <div class="portlet-widgets">
                            <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                            <span class="divider"></span>
                            <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                            <span class="divider"></span>
                            <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="portlet2" class="panel-collapse collapse in">
                        <div class="portlet-body">
                            <div id="morris-line-example" style="height: 200px;"></div>
                        </div>
                    </div>
                </div> <!-- /Portlet -->
            </div>
            <div class="col-lg-6">
            <!--<div class="tile-stats white-bg">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="status m-b-15">
                                <h3 class="m-t-15">Task summary</h3>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div style="background: #1a2942; height: 20px; width: 20px;" class="m-l-15">&nbsp;</div>Pending
                                    </div>
                                    <div class="col-sm-4">
                                        <div style="background: #f13c6e; height: 20px; width: 20px;" class="m-l-15">&nbsp;</div>Ongoing
                                    </div>
                                    <div class="col-sm-4">
                                        <div style="background: #3bc0c3; height: 20px; width: 20px;" class="m-l-15">&nbsp;</div>Complete
                                    </div>

                                </div>
                                <span id="pendingCount" data-value="{{ count(Auth::user()->task->where('status', 'pending')) }}"></span>
                                <span id="ongoingCount" data-value="{{ count(Auth::user()->task->where('status', 'ongoing')) }}"></span>
                                <span id="completeCount" data-value="{{ count(Auth::user()->task->where('status', 'complete')) }}"></span>
                            </div>
                        </div>
                        <div class="col-sm-4 m-t-20">
                            <span class="sparkpie-big"><canvas width="98" height="50" style="display: inline-block; width: 98px; height: 50px; vertical-align: top;"></canvas></span>
                        </div>
                    </div>
                </div>-->
            </div>
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

    <!-- EASY PIE CHART JS -->
    <script src="{{ asset('auth/assets/easypie-chart/easypiechart.min.js') }}"></script>
    <script src="{{ asset('auth/assets/easypie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('auth/assets/easypie-chart/example.js') }}"></script>

    <!--C3 Chart-->
    <script src="{{ asset('auth/assets/c3-chart/d3.v3.min.js') }}"></script>
    <script src="{{ asset('auth/assets/c3-chart/c3.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('auth/assets/morris/morris.min.js') }}"></script>
    <script src="{{ asset('auth/assets/morris/raphael.min.js') }}"></script>

    <!-- sparkline -->
    <script src="{{ asset('auth/assets/sparkline-chart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('auth/assets/sparkline-chart/chart-sparkline.js') }}"></script>



    <!-- Chat -->
    {{--<script src="{{ asset('auth/js/jquery.chat.js') }}"></script>--}}
    <!-- Dashboard -->
    <script src="{{ asset('auth/js/jquery.dashboard.js') }}"></script>

    <script src="{{ asset('auth/assets/timepicker/bootstrap-datepicker.js') }}"></script>



    <script>
        /* ==============================================
         Counter Up
         =============================================== */
        jQuery(document).ready(function($) {

            jQuery("#no-weekly-data").toggle();
            jQuery("#todo-toggle-view").toggle();
            jQuery('#todo-toggle-date').click(function () {
                jQuery("#todo-toggle-view").toggle("slideIn");
            });
            jQuery('.datepicker').datepicker();
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>
@endsection
