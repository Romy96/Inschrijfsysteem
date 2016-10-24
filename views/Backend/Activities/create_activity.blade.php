@extends('Backend/menu')


@section('content_backend')

<?php var_export($event) ?>

<form role="form" method="post" action="create_activity_action.php">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">   <!-- white background -->

                    <div class="box-body">      <!-- some whitespace -->
                        <div class="box-body">      <!-- some more whitespace -->
                                <div class='form-group'>
                                	@foreach ( $event as $row )  
                                		<input type="hidden" name="id" value="{{$row['events_id']}}">
                                	@endforeach
                                    <label for="naam">Activiteit:</label>
                                    <input class="form-control" data-slug="source" placeholder="naam" name="naam" type="text" id="naam">
                                </div>

                                <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                    <input type="text" class="form-control" data-slug="source" placeholder="afbeelding achtergrond" id="afbeelding" name="afbeelding">
                                    <span class="custom-file-control"></span>
                                    <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>

                                <div class='form-group'>
                                    <label for="beschrijving">Beschrijving:</label>
                                    <textarea class="form-control" data-slug="source" placeholder="beschrijving" name="beschrijving" type="text" id="beschrijving" rows="5"></textarea>
                                </div>
                        </div>  <!-- /box-body -->
                    </div>      <!-- /box-body -->
                    <div class="box-footer">
                        <button type="submit" type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-flat">Toevoegen</button>
                    </div>
                </div>      <!-- /nav-tabs-custom -->
            </div>      <!-- /col-md-12 -->
        </div>      <!-- /row -->
    </form>

@endsection