@extends('Backend/menu')


@section('content_backend')

<form role="form" method="post" action="create_event_action.php">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">   <!-- white background -->

                    <div class="box-body">      <!-- some whitespace -->
                        <div class="box-body">      <!-- some more whitespace -->
                                <div class='form-group'>
                                    <label for="naam">Evenement:</label>
                                    <input class="form-control" data-slug="source" placeholder="naam" name="naam" type="text" id="naam">
                                </div>

                                <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                    <input type="text" class="form-control" data-slug="source" placeholder="afbeelding achtergrond" id="afbeelding" name="afbeelding">
                                    <span class="custom-file-control"></span>
                                    <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>

                                <div class="form-group">
                                    <label for="banner">Banner:</label>
                                    <input type="text" class="form-control" data-slug="source" placeholder="banner" id="banner" name="banner">
                                    <span class="custom-file-control"></span>
                                    <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                </div>

                                <div class='form-group'>
                                    <label for="startdatum">Startdatum:</label>
                                    <input class="form-control" data-slug="source" placeholder="startdatum" name="startdatum" type="date" id="startdatum">
                                </div>

                                <div class='form-group'>
                                    <label for="locatie">Locatie:</label>
                                    <input class="form-control" data-slug="source" placeholder="locatie" name="locatie" type="text" id="locatie">
                                </div>
                        </div>  <!-- /box-body -->
                    </div>      <!-- /box-body -->
                    <div class="box-footer">
                        <button type="submit" type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary btn-flat">Opslaan</button>
                    </div>
                </div>      <!-- /nav-tabs-custom -->
            </div>      <!-- /col-md-12 -->
        </div>      <!-- /row -->
    </form>

@endsection