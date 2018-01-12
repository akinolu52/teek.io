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
    <link href="{{ asset('auth/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('extra-js')
    <script src="{{ asset('auth/assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('auth/assets/datatables/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>
@endsection