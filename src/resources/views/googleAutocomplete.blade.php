<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How to Add Google Map in Laravel? - ItSolutionStuff.com</title>

    <style>
        #map {
            height: 400px;
            width: 400px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <div id="map"></div>
</div>

<script>

</script>

<script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>

</body>
</html>
