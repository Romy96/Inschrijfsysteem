@extends('Backend/menu')


@section('content')


<form role="form" method="post" action="Edit_event_action.php">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">   <!-- white background -->

                <div class="box-body">      <!-- some whitespace -->
                    <div class="box-body">      <!-- some more whitespace -->
                        @foreach ( $event as $row )
                            <div class='form-group'>
                                <label for="title">Evenement:</label>
                                <input class="form-control" data-slug="source" placeholder="Title" name="title" type="text" id="title" value="{{$row['name']}}">
                            </div>

                            <div class='form-group'>
                                <label for="startdatum">Startdatum:</label>
                                <input class="form-control" data-slug="source" placeholder="startdatum" name="startdatum" type="text" id="startdatum" value="{{$row['start_date']}}">
                            </div>

                            <div class='form-group'>
                                <label for="locatie">Locatie:</label>
                                <input class="form-control" data-slug="source" placeholder="locatie" name="locatie" type="text" id="locatie" value="{{$row['location']}}">
                            </div>
                        @endforeach
                    </div>  <!-- /box-body -->
                </div>      <!-- /box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">Opslaan</button>
                </div>


            </div>      <!-- /nav-tabs-custom -->
        </div>      <!-- /col-md-12 -->
    </div>      <!-- /row -->
</form>





@endsection