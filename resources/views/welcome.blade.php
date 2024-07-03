<x-navbar></x-navbar>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     <div class="container">
        <!-- info panel -->
         <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <a href="#lokasi-peta">
                            <img src="img/map.png" alt="map" class="float-left">
                            <h4>PETA LOKASI</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </a>
                    </div>
                    <div class="col-lg">
                        <a href="#data-stunting">
                            <img src="img/data.png" alt="data" class="float-left">
                            <h4>DATA STUNTING</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </a>
                    </div>
                    <div class="col-lg">
                        <a href="#">
                            <img src="img/about.png" alt="about" class="float-left">
                            <h4>ABOUT US</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </a>
                    </div>
                </div>
            </div>
         </div>
         <!-- end info panel -->

         <!-- Map Space -->
          <div class="row map" id="lokasi-peta">
            <div class="col-lg map-container">
                <div id="map" class="img-fluid"></div>
            </div>
            <div class="col-lg map-content">
                <h3> PETA LOKASI <span>STUNTING </span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, debitis?</p>
            </div>
          </div>
          <!-- end Map -->

          <!-- Data Stunting Space -->
          <div class="row justify-content-center data" id="data-stunting">
            <div class="col-lg-10">
                <h3> DATA STUNTING / KECAMATAN <span>2023 </span></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus officiis beatae pariatur omnis ea! Labore debitis, perferendis, ipsa voluptatem illum rem inventore nihil alias eveniet tempore recusandae illo sequi ex.</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kecamatan</th>
                            <th>Persentase Kasus Stunting</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <th>{{$item->kecamatan}}</th>
                                <th>{{number_format($item->persentase, 2)}}%</th>
                                <td>
                                    <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-primary">Info Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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