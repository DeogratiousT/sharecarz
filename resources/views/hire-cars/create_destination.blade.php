@extends('layouts.main')

@section('head')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 550px;
        width: 100%;
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
      }

      /* Optional: Makes the sample page fill the window. */
      /* html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      } */

      .custom-map-control-button {
        appearance: button;
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        margin: 10px;
        padding: 0 0.5em;
        height: 40px;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
      }
      .custom-map-control-button:hover {
        background: #ebebeb;
      }
    </style>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
		let map, infoWindow;

		function initMap() {

			map = new google.maps.Map(document.getElementById("map"), {
			center: { lat: 51.5074, lng: -0.1278 },
			zoom: 17,
			});

			var carMarker;
      var pos;
			var infoWindow = new google.maps.InfoWindow();;

			const locationButton = document.createElement("button");
			locationButton.textContent = "Pan to Current Location";
			locationButton.classList.add("custom-map-control-button");
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(
			locationButton
			);

      const saveButton = document.createElement("button");
			saveButton.textContent = "Save Destination Location";
			saveButton.classList.add("custom-map-control-button");
      saveButton.style.backgroundColor = "green";
      saveButton.style.color = "white";
			map.controls[google.maps.ControlPosition.TOP_RIGHT].push(
			saveButton
			);

			locationButton.addEventListener("click", () => {
        alert('From you current location, Drag your Green marker to the pick up point of choise then click "Save Location" button on screen top right to save');
			// Try HTML5 geolocation.
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(
					(position) => {
						   pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude,
						};
						
						addMarker(pos);

						// savePosition(pos);
						
					},
					() => {
						handleLocationError(true, infoWindow, map.getCenter());
					}
					);
				} else {
					// Browser doesn't support Geolocation
					handleLocationError(false, infoWindow, map.getCenter());
				}
			});

			function addMarker(pos){
				const image = "{{ asset('img/green-dot.png') }}";
                carMarker = new google.maps.Marker({
                  position: pos,
                  map: map,
                  icon: image,
                  draggable: true
                });

				map.setCenter(pos);
        
        carMarker.addListener("dragend", function(evt) {
          // console.log(evt.latLng.lat());
          pos = evt.latLng;
          carMarker.setPosition(pos);
				  map.setCenter(pos);

        });

				carMarker.addListener("click", function(){
					infoWindow.setContent('<?php echo("Passanger:"); echo(Auth::user()->name); ?>&nbsp;&nbsp;');
					infoWindow.open(map,carMarker);
				});
			}

      saveButton.addEventListener("click", function() {

        $.ajax({
                    url: "{{ route('passanger-save-destination',['driver'=>$driver]) }}",
                    type: "POST",
                    data:{
                        pos:pos,
                        _token: '{{csrf_token()}}'
                    },
                    success:function(response){
                        if(response) {
                          window.location.href = response.redirect;
                          alert(response.success);
                        }else{
                          alert('Error Saving this Location, Try again');
                        }
                    },
                });
						
					});

		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(
			browserHasGeolocation
				? "Error: The Geolocation service failed."
				: "Error: Your browser doesn't support geolocation."
			);
			infoWindow.open(map);
      }
    </script>
@endsection
@section('main')
    
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBU-QR8Dk0TfntORpRPrHZgaFLbMXocCj8&callback=initMap&libraries=&v=weekly"
      async
    ></script>
@endsection