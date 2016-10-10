@extends('Backend/menu')

@section('content_backend')

<h1>Gebruikers</h1>


    <div class="row">
    	<div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="register.php" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe account
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
                            <th>Email</th>
                            <th>Wachtwoord</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($users))
                            @foreach ( $users as $rows ) 
                                <tr>
                                    <td>
                                        {{$rows['account_id']}}
                                    </td>
                                    <td>
                                        {{$rows['Email']}}
                                    </td>
                                    <td>
                                        {{$rows['Password']}}
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