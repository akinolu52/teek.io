@extends('layout.user')

@section('title', 'task')

@section('content')
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Task</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">
                                        <span class="help-block">
                                            {{ Session::get('message') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>s/n</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>End Date</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Auth::user()->role == 'user')
                                        @foreach(Auth::user()->task as $c => $t)
                                            <tr>
                                                <td>{{ ++$c }}</td>
                                                <td>{{ $t->title }}</td>
                                                <td>{{ $t->description }}</td>
                                                <td>{{ $t->end_date }}</td>
                                                <td>{{ $t->created_at->format('d/m/Y') }}</td>
                                                <td>{{ ucfirst($t->status) }}</td>
                                                <td>
                                                    @if($t->status == 'pending')
                                                        <a href="#" title="edit task" data-toggle="modal"
                                                           data-target="#edit-modal-{{ $t->id }}">
                                                            <i class="ion-edit" style="color: blue;"></i>
                                                        </a>
                                                        <div id="edit-modal-{{ $t->id }}" class="modal fade"
                                                             tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                             aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal" aria-hidden="true">
                                                                            ×
                                                                        </button>
                                                                        <h4 class="modal-title">Edit
                                                                            <b>{{ $t->title }}</b> task</h4>
                                                                    </div>
                                                                    <form method="post" id="edit-form"
                                                                          action="{{ route('task.update', $t->id) }}">
                                                                        {{ method_field('PUT') }}
                                                                        <div class="modal-body">

                                                                            {{ csrf_field() }}
                                                                            <div class="row">
                                                                                <div class="col-sm-12 form-group">
                                                                                    <label>Name</label>
                                                                                    <input type="text" name="title"
                                                                                           class="form-control"
                                                                                           placeholder="Name of the task"
                                                                                           value="{{ $t->title }}">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12 form-group todo-inputbar">
                                                                                    <label>Description</label>
                                                                                    <textarea name="description"
                                                                                              cols="10" rows="1"
                                                                                              class="form-control autogrow"
                                                                                              placeholder="Description of the task"
                                                                                              style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $t->description }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-4 form-group  pointer"
                                                                                     title="Add end date"
                                                                                     style="margin-top: 1px;"
                                                                                     id="edit-toggle-date">
                                                                                    <i>
                                                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPpSURBVGhD7VlJaxRBFB5JXBHc0ZnpnkFR0JzEeHS5qLiAIgjqyZMRFEz+gF4UVPQaMYh6mu6eFtwNenHwHiFICCFTNWOiSUBFQTFRDBm/KgttJs/O9FIzEPzgY5au9973ql7X0p34j9mKpMszqTw7YTi8CyykHTZq2PwLvlcMm03i9yd8DqQd/gDfL6Ycviv5aGSRMm8sjPzw8rTN2tM275GCAxK240gqZ1jFvYlKZY5yWz8kcwMrIf7Knx6PgzbrTVv8SH0SQpB0vnQSgT9MExIfC1m7vElFjB+pe/0rDIc9IQLHTpTbBMquTYWOD8lceSOSeEMF1UkkcytRKDQrGdFgWmwr7oWPVKD6kD1ucfvmKTnhkMkPtiCJ93SAepK5CbfSpGQFw+97gg9Pd9oYosyuKWkBgNmpXjd2zbTZlGmVDiqFtUFNsbTDAMRa8wMrOccsNEJdD0xR5liElUx/yJKK6eZGObwWPk2Xb6Ouh6LNb0ihM0Gu2JSDENSTCPZtObZBiv0XxLAh46+kgxDUkggo1xc/pC12ljIMS22JYOXP3i8vlaIpYDReUYZhqSsRQfimtzDiPEEZRKHORMBuKbwa6lBEGYSm1kRwhGjt6pkrxXuBi+JkRxuFpOYRqSSd4hYp3gsEfUk1jkLdiRh5dlyK9wLrxzuycQRqT8Rm56R4L0TNkY2rKLcdOKPXRIc7wnfKLW8mr9MsUnEpoqOmbySphiRtNqRMtABr2QEyLkGsJ9eV2V9gRH5SjauJXhjLuKy1JuI8I3yvcvsWk9cJwn87FZci2nZK8V7gz89U4yiET733iMMuSfFeYJj66cbhqTsRMXpSvBdI5CHVOAq1J+Kw/VK8F5gtLlCNo1B3ImJbJcV7YVp8N9U4CnUmIk6eUng1cBZZiKn1G2UUllpHxO+kiPKySKOQ1JpIvrRTiqZg2qU9pFFI6koEfkv+D7vFYyCb9VLGYahxRE5LvX4Qj/YJw1DUlMjb7J3yAinWF3JU+AvCQWCKEhBvpjDfd1DXw5EdU0pnhng/ARHjtKPGER3yXEmsHTA6RTlrFKFndK3FVyt5wYBRuUk5rTdldfhNtzPCrTShJ2LfgwWizSYDP7ymsL57cD5usLtkEM1EJ04YFjuspMQAMTI4VqJ3pqiAOoh4Y6bNtysF8cK0i4cwNWt/g4UknmXd8hoVVg8yuaFlYsMmapcSEYUopRF01lEVqj4Qj/axybwNfqdEBSESKBsWP1Pbiq0J61y+BKXQhlF6Ctb8SgLnCYbPLsMp7fDfADYChUKzeIwpngCi9M6jp68KsUi0E5+X8bsD3/el7KKpLP5jliKR+AU3iab4xlMMUwAAAABJRU5ErkJggg==">
                                                                                    </i>
                                                                                    <small class="username">Add end
                                                                                        date
                                                                                    </small>
                                                                                </div>
                                                                                <div class="col-sm-8 form-group p-t-10"
                                                                                     id="edit-toggle-view">
                                                                                    <input type="text"
                                                                                           class="form-control datepicker"
                                                                                           placeholder="dd/mm/yyyy"
                                                                                           value="{{ $t->end_date }}"
                                                                                           name="end_date"
                                                                                           title="Enter date of completion">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-white"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <button type="submit" class="btn btn-info">
                                                                                Save
                                                                            </button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form action="{{ route('task.destroy', [$t->id]) }}"
                                                              method="post" style="display: inline">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" title="delete task"
                                                                    style="border: transparent; background: transparent; padding: 0; margin: 0;">
                                                                <i class="fa fa-fw fa-close" style="color: red;"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($tasks as $c => $t)
                                            <tr>
                                                <td>{{ ++$c }}</td>
                                                <td>{{ $t->title }}</td>
                                                <td>{{ $t->description }}</td>
                                                <td>{{ $t->end_date }}</td>
                                                <td>{{ $t->created_at->format('d/m/Y') }}</td>
                                                <td>{{ ucfirst($t->status) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-css')
    <link href="{{ asset('auth/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        @media (min-width: 768px) {
            .form-inline .form-group {
                display: block;
                margin-bottom: 15px;
                vertical-align: inherit;
            }

            .form-inline #edit-form .form-control {
                display: block;
                width: 100%;
            }
        }
    </style>

@endsection

@section('extra-js')
    <script src="{{ asset('auth/assets/timepicker/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('auth/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('auth/assets/datatables/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            jQuery('.datepicker').datepicker();
            jQuery("#edit-toggle-view").toggle();
            jQuery('#edit-toggle-date').click(function () {
                jQuery("#edit-toggle-view").toggle("fadeIn");
            });
            $('#datatable').dataTable();
        });
    </script>
@endsection