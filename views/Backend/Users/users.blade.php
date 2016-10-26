@extends('Backend/menu')

@section('content_backend')

<h1>Accounts</h1>


    <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sorteer</th>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Wachtwoord</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($users))
                            @foreach($users as $row)
                                <tr>
                                    <td>
                                        {{$row['account_id']}}
                                    </td>
                                    <td>
                                        {{$row['displayname']}}
                                    </td>
                                    <td>
                                    	{{$row['Email']}}
                                    </td>
                                    <td>
                                    	{{$row['Password']}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="Delete_user_action.php?id={{$row['account_id']}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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


@endsection