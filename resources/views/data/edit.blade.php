@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('data.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ $data->kecamatan }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_kasus" class="form-label">Jumlah Kasus</label>
                            <input type="number" name="jumlah_kasus" id="jumlah_kasus" class="form-control" value="{{ $data->jumlah_kasus }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">Info</label>
                            <textarea name="info" id="info" class="form-control" rows="3">{{ $data->info }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="latitude" class="form-label">Latitude</label>
                                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $data->latitude }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="longitude" class="form-label">Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $data->longitude }}" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('data.superadminindex') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary ms-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-label {
        font-weight: 500;
    }
    .card {
        border: none;
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        border-color: #80bdff;
    }
</style>
@endsection
