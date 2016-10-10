@extends('Backend/menu')

@section('content_backend')

@foreach ( $event as $row )  
        <h1>{{$row['name']}}</h1>
@endforeach


    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="create_activity.php" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe activiteit
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
                            <th>Activiteit</th>
                            <th>Beschrijving</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($activities))
                            @foreach ( $activities as $rows ) 
                                <tr>
                                    <td>
                                        {{$rows['activity_id']}}
                                    </td>
                                    <td>
                                        {{$rows['name']}}
                                    </td>
                                    <td>
                                        {{$rows['description']}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="Edit_activity.php?{{$rows['activity_id']}}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="Delete_activity_action.php?{{$rows['activity_id']}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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