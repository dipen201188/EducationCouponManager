@extends('layouts.app')

@section('content')
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 500px;
        }
        .controls {
            background-color: #fff;
            border-radius: 2px;
            border: 1px solid transparent;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            height: 29px;
            margin-left: 17px;
            margin-top: 10px;
            outline: none;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        .controls:focus {
            border-color: #4d90fe;
        }
    </style>
    <div class="container">

        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            {{ Form::open(array('url' => 'business')) }}

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill out form below to add new school.</div>
                    <div class="panel-body">
                        <div class="col-md-7">
                            <input id="pac-input" class="controls" type="text"
                                   placeholder="Find your business here">
                            <div class="">
                                <div id="map"></div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                {{ Form::label('name', 'Name' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('name', Input::old('name'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('street_address', 'Street' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('street_address', Input::old('street_address'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('place_id', 'place id' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('place_id', Input::old('place_id'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('city', 'City' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('city', Input::old('city'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('state', 'State' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('state', Input::old('state'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('zip', 'Zip' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('zip', Input::old('zip'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('country', 'Country' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('country', Input::old('Country'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('admin', 'Admin Email' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('admin', Input::old('admin'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('lat', 'lat' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('lat', Input::old('lat'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('lng', 'lng' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('lng', Input::old('lng'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::close() }}
        </div>

        <div class="row">

            <div class="hide" id="bus_loc">

            </div>
        </div>

    </div>
@endsection
<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }

            // Set the position of the marker using the place ID and location.
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location
            });
            marker.setVisible(true);

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                    'Place ID: ' + place.place_id + '<br>' +
                    place.formatted_address + '<br>'+ place.geometry.location.address_components);
            infowindow.open(map, marker);
            populateForm(place);
        });
    }

    function populateForm(place) {
        $('#name').val(place.name);
        $('#place_id').val(place.place_id);
        $('#bus_loc').html(place.adr_address);
        $('#street_address').val($('#bus_loc .street-address').text());
        $('#city').val($('#bus_loc .locality').text());
        $('#state').val($('#bus_loc .region').text());
        $('#zip').val($('#bus_loc .postal-code').text());
        $('#country').val($('#bus_loc .country-name').text());
        $('#lat').val(place.geometry.location.lat);
        $('#lng').val(place.geometry.location.lng);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdFlIzrCC3YhCnQg5-pxC80bhP0sihZMg&libraries=places&callback=initMap"
        async defer></script>