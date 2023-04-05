@push('scripts')

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxrnwTyDI68in8hdLFZC-3EHx1E_GhdhU"></script>
    <script>
        var map;
        var marker;
        center = {lat: {{$lat??24.725087}}, lng: {{$lng??46.576121}}};

        $('#lat').val(center.lat);
        $('#lng').val(center.lng);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 7
            });
            marker = new google.maps.Marker({position: center, map: map});

            @if($enableClick)
            map.addListener('click', function (e) {
                // 3 seconds after the center of the map has changed, pan back to the
                // marker.
                placeMarkerAndPanTo(e.latLng, map);

            });
            @endif
        }


        function placeMarkerAndPanTo(latLng, map) {
            marker.setMap(null);

            $('#lat').val(latLng.lat());
            $('#lng').val(latLng.lng());
            marker = new google.maps.Marker({
                position: latLng,
                map: map
            });
            map.panTo(latLng);
        }

        $('#mapLink').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            initMap();
            $('#map').css('height', '500px');
        });
        @if(!isset($showEvent))
        initMap();
        @endif
    </script>
@endpush
