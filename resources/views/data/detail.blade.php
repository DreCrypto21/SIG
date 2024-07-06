<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <x-navbar></x-navbar>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center bg-primary text-white" style="height: 600px; display: flex; align-items: center;">
      <div class="container">
          <h1 class="display-4">Detail Informasi {{$data->kecamatan}}</h1>
          <p class="lead">Informasi detail mengenai kecamatan {{$data->kecamatan}}</p>
      </div>
  </div>
  <!-- End Jumbotron -->

  <!-- Information Section -->
  <div class="container mt-5 p-4 bg-white rounded shadow">
      <div class="row">
          <div class="col-md-6 mb-4">
              <h3 class="text-primary">Detail Kasus</h3>
              <p><strong>Jumlah Kasus:</strong> {{$data->jumlah_kasus}}</p>
              <p><strong>Informasi:</strong> {{$data->info}}</p>
          </div>
          <div class="col-md-6 mb-4">
              <h3 class="text-primary">Lokasi</h3>
              <p><strong>Latitude:</strong> {{$data->latitude}}</p>
              <p><strong>Longitude:</strong> {{$data->longitude}}</p>
              <!-- Example map integration -->
              <div id="map" class="border rounded" style="height: 300px; width: 100%;"></div>
              <!-- Aerial View -->
              <div id="aerial-view" class="mt-3">
                <img id="aerial-image" src="" alt="Aerial View Image" style="width: 100%; height: auto;">
            </div>
            
          </div>
      </div>
  </div>
  <!-- End Information Section -->

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- Google Maps JavaScript API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap
" async defer></script>
  <!-- Custom script for Aerial View -->
  <script>
    async function initAerialView() {
    const location = { lat: parseFloat("{{$data->latitude}}"), lng: parseFloat("{{$data->longitude}}") };
    const API_KEY = 'AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao'; // Ganti dengan kunci API Aerial View Anda
    const displayEl = document.querySelector('#aerial-image');

    const parameterValue = `${location.lat},${location.lng}`;
    const parameterKey = videoIdOrAddress(parameterValue);
    const urlParams = new URLSearchParams();
    urlParams.set(parameterKey, parameterValue);
    urlParams.set('key', API_KEY);

    try {
        const response = await fetch(`https://aerialview.googleapis.com/v1/videos:lookupVideo?${urlParams.toString()}`);
        if (!response.ok) {
            throw new Error('Failed to load aerial view. Please try again later.');
        }
        const videoResult = await response.json();

        if (videoResult.state === 'PROCESSING') {
            alert('Video masih dalam proses..');
        } else if (videoResult.error && videoResult.error.code === 404) {
            alert('Video tidak ditemukan. Untuk membuat video untuk alamat tertentu, panggil metode renderVideo pada Aerial View.');
        } else {
            displayEl.src = videoResult.uris.IMAGE.landscapeUri;
        }
    } catch (error) {
        console.error('Error fetching aerial view:', error);
        alert('Terjadi kesalahan saat memuat aerial view. Mohon coba lagi nanti.');
    }
}


      function videoIdOrAddress(value) {
          const videoIdRegex = /[0-9a-zA-Z-_]{22}/;
          return value.match(videoIdRegex) ? 'videoId' : 'address';
      }

      // Initialize and add the map
      function initMap() {
          const location = { lat: parseFloat("{{$data->latitude}}"), lng: parseFloat("{{$data->longitude}}") };
          const map = new google.maps.Map(document.getElementById("map"), {
              zoom: 14,
              center: location
          });
          const marker = new google.maps.Marker({
              position: location,
              map: map
          });

          // Initialize Aerial View
          initAerialView();
      }
  </script>

</body>
</html>
