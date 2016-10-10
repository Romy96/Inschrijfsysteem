@extends('Backend/menu')

@section('content_backend')

<h1>Evenementen</h1>


    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="create_event.php" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe evenement
                    </a>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sorteer</th>
                            <th>Evenement</th>
                            <th>Startdatum</th>
                            <th>Locatie</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($events))
                            @foreach($events as $row)
                                <tr>
                                    <td>
                                        <a href="event_activities.php?id={{$row['events_id']}}">
                                            {{$row['events_id']}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['events_id']}}">
                                            {{$row['name']}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['events_id']}}">
                                            {{$row['start_date']}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['events_id']}}">
                                            {{$row['location']}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="Edit_event.php?{{$row['events_id']}}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="Delete_event_action.php?{{$row['events_id']}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>

@endsection