<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stunting Data Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .jumbotron {
            background-color: #e9ecef;
            padding: 4rem 2rem;
            margin-bottom: 2rem;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            color: white;
        }

        .jumbotron::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .jumbotron .container {
            position: relative;
            z-index: 2;
        }

        .info-panel {
            background-color: #fff;
            box-shadow: 0 3px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 30px;
            margin-top: -100px;
        }

        .info-panel img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .info-panel h4 {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 5px;
        }

        .info-panel p {
            font-size: 14px;
            color: #acacac;
            margin-top: -5px;
        }

        .map-section {
            margin-bottom: 2rem;
        }

        .map-container {
            position: relative;
            padding-bottom: 56.25%;
            /* Aspect ratio 16:9 */
            height: 0;
            overflow: hidden;
        }

        .map-responsive {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
        }

        .map-content {
            padding: 1rem;
        }

        .legend .color-box {
            width: 20px;
            height: 20px;
            display: inline-block;
            margin-right: 5px;
        }

        .color-1 {
            background-color: #FFA07A;
        }

        .color-2 {
            background-color: #FA8072;
        }

        .color-3 {
            background-color: #E9967A;
        }

        .color-4 {
            background-color: #F08080;
        }

        @media (max-width: 991px) {
            .info-panel {
                margin-top: 0;
            }

            .map-content {
                text-align: center;
            }

            .legend {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }

            .legend>div {
                margin: 0 10px;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Stunting Data Dashboard</h1>
            <p class="lead">Comprehensive information about stunting cases in our region.</p>
        </div>
    </div>

    <!-- Container -->
    <div class="container">
        <!-- Info Panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <a href="#lokasi-peta" class="text-decoration-none text-dark">
                            <img src="img/map.png" alt="Location Map" class="float-left">
                            <h4>LOCATION MAP</h4>
                            <p>Distribution of stunting cases</p>
                        </a>
                    </div>
                    <div class="col-lg">
                        <a href="#data-stunting" class="text-decoration-none text-dark">
                            <img src="img/data.png" alt="Stunting Data" class="float-left">
                            <h4>STUNTING DATA</h4>
                            <p>Detailed statistics by district</p>
                        </a>
                    </div>
                    <div class="col-lg">
                        <a href="#about-us" class="text-decoration-none text-dark">
                            <img src="img/about.png" alt="About Us" class="float-left">
                            <h4>ABOUT US</h4>
                            <p>Learn more about our mission</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map Space -->
        <div class="row map-section" id="lokasi-peta">
            <div class="col-lg-8 col-md-12 map-container">
                <div id="map" class="map-responsive"></div>
            </div>
            <div class="col-lg-4 col-md-12 map-content">
                <h3>STUNTING <span class="text-primary">LOCATION MAP</span></h3>
                <h5>Distribution of Stunting Cases</h5>
                <div class="legend">
                    <div><div class="color-box color-1"></div> 90 - 147</div>
                    <div><div class="color-box color-2"></div> 147 - 252</div>
                    <div><div class="color-box color-3"></div> 252 - 389</div>
                    <div><div class="color-box color-4"></div> 389 - 591</div>
                </div>
            </div>
        </div>

        <!-- Data Stunting Space -->
        <div class="row justify-content-center data-section mb-5" id="data-stunting">
            <div class="col-lg-10">
                <h2 class="text-center mb-4">STUNTING DATA BY DISTRICT <span class="text-primary">2023</span></h2>
                <p class="lead text-center mb-5">Detailed information about stunting cases in each district, helping us to identify areas that need more attention and resources.</p>

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>District</th>
                                <th>Stunting Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td>{{$item->kecamatan}}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{$item->persentase}}%;" aria-valuenow="{{$item->persentase}}" aria-valuemin="0" aria-valuemax="100">{{number_format($item->persentase, 2)}}%</div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Detailed Info</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container d-flex justify-content-center">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <!-- About Us -->
        <div class="row justify-content-center mb-5" id="about-us">
            <div class="col-lg-10">
                <x-about></x-about>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script src="{{ asset('js/map.js') }}"></script>
</body>

</html>
