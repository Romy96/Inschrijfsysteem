@extends('Backend/menu')


@section('content_backend')

@if(isset($activity))

    <form role="form" method="post" action="Edit_activity_action.php">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">   <!-- white background -->

                    <div class="box-body">      <!-- some whitespace -->
                        <div class="box-body">      <!-- some more whitespace -->
                                <div class='form-group'>
                                    <input type="hidden" name="activity_id" value="{{$activity['activity_id'] or 0}}"> 
                                		<input type="hidden" name="events_id" value="{{$event['events_id'] or 0}}">
                                    <label for="naam">Activiteit:</label>
                                    <input class="form-control" data-slug="source" placeholder="naam" name="naam" type="text" id="naam" value="{{$activity['name']}}">
                                </div>

                                <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                    <input type="text" class="form-control" data-slug="source" id="afbeelding" name="afbeelding" value="{{$activity['image']}}">
                                    <span class="custom-file-control"></span>
                                    <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>

                                <div class='form-group'>
                                    <label for="beschrijving">Beschrijving:</label>
                                    <textarea class="form-control" data-slug="source" placeholder="beschrijving" name="beschrijving" type="text" id="beschrijving"   rows="5">{{$activity['description']}}</textarea>
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