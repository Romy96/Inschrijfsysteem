@extends('Backend/menu')


@section('content_backend')

@if(isset($event))
    <form role="form" method="post" action="Edit_event_action.php">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">   <!-- white background -->

                    <div class="box-body">      <!-- some whitespace -->
                        <div class="box-body">      <!-- some more whitespace -->
                                <div class='form-group'>
                                    <input type="hidden" name="ID" value="{{$event['id']}}">
                                    <label for="title">Evenement:</label>
                                    <input class="form-control" data-slug="source" placeholder="Naam" name="naam" type="text" id="naam" value="{{$event['name']}}">
                                </div>

                                <div class='form-group'>
                                    <label for="startdatum">Startdatum:</label>
                                    <input class="form-control" data-slug="source" placeholder="startdatum" name="startdatum" type="text" id="startdatum" value="{{$event['start_date']}}">
                                </div>

                                <div class='form-group'>
                                    <label for="locatie">Locatie:</label>
                                    <input class="form-control" data-slug="source" placeholder="locatie" name="locatie" type="text" id="locatie" value="{{$event['location']}}">
                                </div>
                        </div>  <!-- /box-body -->
                    </div>      <!-- /box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">Opslaan</button>
                    </div>
                </div>      <!-- /nav-tabs-custom -->
            </div>      <!-- /col-md-12 -->
        </div>      <!-- /row -->
    </form>
@endif



@endsection