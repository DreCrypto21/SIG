<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stunting Data Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --text-color: #34495e;
            --bg-color: #ecf0f1;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: var(--bg-color);
        }

        .bg-hero {
    background-image: linear-gradient(to bottom, rgba(52, 152, 219, 0.8), rgba(52, 152, 219, 0.5)), url('https://via.placeholder.com/1920x1080');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    align-items: center;
    color: #fff;
}

.bg-hero .container {
    z-index: 1;
    position: relative;
}

.bg-hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}
        .info-panel {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: -5rem;
            position: relative;
            z-index: 2;
        }

        .info-panel .icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
        }

        .team-card {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .social-icons a {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--secondary-color);
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>

    <div class="jumbotron jumbotron-fluid text-center bg-hero">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Stunting Data Dashboard</h1>
            <p class="lead mb-5">Comprehensive information about stunting cases in our region.</p>
            <a href="#data-stunting" class="btn btn-primary btn-lg px-5 py-3">Explore Data</a>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 info-panel">
                <div class="row text-center">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <a href="#lokasi-peta" class="text-decoration-none text-dark">
                            <i class="fas fa-map-marked-alt icon"></i>
                            <h4>LOCATION MAP</h4>
                            <p>Distribution of stunting cases</p>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0">
                        <a href="#data-stunting" class="text-decoration-none text-dark">
                            <i class="fas fa-chart-bar icon"></i>
                            <h4>STUNTING DATA</h4>
                            <p>Detailed statistics by district</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#about-us" class="text-decoration-none text-dark">
                            <i class="fas fa-users icon"></i>
                            <h4>ABOUT US</h4>
                            <p>Learn more about our mission</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5" id="lokasi-peta">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="map-container">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3 class="section-title">STUNTING LOCATION MAP</h3>
                <h5 class="mb-3">Distribution of Stunting Cases</h5>
                <div class="legend">
                    <div class="mb-2"><span class="color-box" style="background-color: #FFA07A;"></span> 90 - 147</div>
                    <div class="mb-2"><span class="color-box" style="background-color: #FA8072;"></span> 147 - 252</div>
                    <div class="mb-2"><span class="color-box" style="background-color: #E9967A;"></span> 252 - 389</div>
                    <div class="mb-2"><span class="color-box" style="background-color: #F08080;"></span> 389 - 591</div>
                </div>
            </div>
        </div>

        <div class="row my-5" id="data-stunting">
            <div class="col-12">
                <h2 class="section-title text-center">STUNTING DATA BY DISTRICT 2023</h2>
                <p class="lead text-center mb-5">Detailed information about stunting cases in each district, helping us to identify areas that need more attention and resources.</p>

                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
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
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$item->persentase}}%;" aria-valuenow="{{$item->persentase}}" aria-valuemin="0" aria-valuemax="100">{{number_format($item->persentase, 2)}}%</div>
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
                <div class="pagination-container d-flex justify-content-center mt-4">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

        <div id="about-us" class="my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <x-about></x-about>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-5" id="our-team">
            <div class="col-lg-10">
                <h2 class="text-center mb-5">Meet Our Team</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/500" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Team Member 1</h5>
                                <p class="card-text">Project Manager</p>
                                <div class="social-icons mt-3">
                                    <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/500" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Team Member 2</h5>
                                <p class="card-text">Data Analyst</p>
                                <div class="social-icons mt-3">
                                    <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/500" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Team Member 3</h5>
                                <p class="card-text">Health Specialist</p>
                                <div class="social-icons mt-3">
                                    <a href="#" class="text-primary me-2"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="text-primary me-2"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-primary"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <script src="{{ asset('js/map.js') }}"></script>
</body>

</html>