<x-navbar></x-navbar>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
    </style>
</head>
<body>
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>
    <!-- end jumbotron -->

  <!-- container -->
<div class="container my-5">
    <!-- info panel -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="row info-panel">
                <div class="col-md-4">
                    <a href="#lokasi-peta" class="info-card">
                        <img src="img/map.png" alt="map" class="info-icon">
                        <h4>PETA LOKASI</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#data-stunting" class="info-card">
                        <img src="img/data.png" alt="data" class="info-icon">
                        <h4>DATA STUNTING</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="info-card">
                        <img src="img/about.png" alt="about" class="info-icon">
                        <h4>ABOUT US</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end info panel -->

    <!-- Map Space -->
    <div class="row map-section align-items-center mb-5" id="lokasi-peta">
        <div class="col-lg-6 map-container">
            <div id="map" class="img-fluid"></div>
        </div>
        <div class="col-lg-6 map-content">
            <h2>PETA LOKASI <span class="text-primary">STUNTING</span></h2>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, debitis?</p>
        </div>
    </div>
    <!-- end Map -->

    <!-- Data Stunting Space -->
    <div class="row justify-content-center data-section mb-5" id="data-stunting">
        <div class="col-lg-10">
            <h2 class="text-center mb-4">DATA STUNTING / KECAMATAN <span class="text-primary">2023</span></h2>
            <p class="lead text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus officiis beatae pariatur omnis ea! Labore debitis, perferendis, ipsa voluptatem illum rem inventore nihil alias eveniet tempore recusandae illo sequi ex.</p>
            
            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Persentase Kasus Stunting</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach  ($data as $key => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td>{{$item->kecamatan}}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$item->persentase}}%;" aria-valuenow="{{$item->persentase}}" aria-valuemin="0" aria-valuemax="100">{{number_format($item->persentase, 2)}}%</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Info Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination-container d-flex justify-content-center">
                {{ $data->links('pagination::simple-bootstrap-4') }}
            </div>
            
        </div>
    </div>
    <!-- end Data -->
</div>
<!-- end container -->

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var location = { lat: -9.9335807, lng: 123.4171353 };

            // Buat peta
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: location
            });
        }
    </script>
</body>
</html>