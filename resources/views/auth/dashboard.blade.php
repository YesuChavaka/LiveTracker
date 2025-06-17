@extends('auth.layouts')

@section('content')

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
@php
    $users = App\Models\AttendanceLog::all();
    // dd($users);
@endphp
<div class="container-fluid py-3">
    <div class="row">
        <!-- Sidebar with User Cards -->
        <div class="col-md-4">
            <div class="card shadow-sm d-flex flex-column justify-content-between h-100">
                
                <!-- User List -->
                <div class="card-body overflow-auto" style="max-height: 400px;">
                    @foreach ($users as $user)
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-1">{{ $user->getusernames->name }}</h6>
                                <p class="text-muted mb-1" style="font-size: 0.9rem;">{{ $user->getusernames->email }}</p>
                                
                                <div class="mb-1">
                                    <strong>Status:</strong>
                                    <span class="badge {{ $user->status === 'present' ? 'bg-success' : 'bg-secondary' }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </div>
                                <div class="mb-1">
                                    <strong>Check-in:</strong>
                                    {{ $user->check_in_time ? \Carbon\Carbon::parse($user->check_in_time)->format('h:i A') : 'N/A' }}
                                </div>
                                <div>
                                    <strong>Check-out:</strong>
                                    {{ $user->check_out_time ? \Carbon\Carbon::parse($user->check_out_time)->format('h:i A') : 'N/A' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Bottom Quick Navigation Cards -->
                <div class="card-footer bg-white border-top">
                    <div class="row g-2">
                        @php
                            $bottomCards = ['Dashboard', 'Settings', 'Analytics', 'Maps'];
                        @endphp

                        @foreach($bottomCards as $item)
                            <div class="col-3">
                                <div class="card text-center shadow-sm border-0">
                                    <div class="card-body p-2">
                                        <small class="text-muted">{{ $item }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <!-- Map Area -->
        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                
                <div class="card-body p-0">
                    <div id="map" style="height: 480px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
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
