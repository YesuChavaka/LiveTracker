@extends('auth.layouts')

@section('content')

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="container mt-4">
    <h2> Tracking Dashboard with Map</h2>

    <div id="map" style="height: 500px; width: 100%; border: 1px solid #ccc;"></div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([17.3850, 78.4867], 13); // Example: Hyderabad

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([17.3850, 78.4867]).addTo(map)
            .bindPopup('You are here.')
            .openPopup();
    });
</script>

@endsection
