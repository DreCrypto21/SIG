<!-- resources/views/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Data</div>
                    <div class="card-body">
                        <form action="{{ route('data.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan:</label>
                                <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ $data->kecamatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kasus">Jumlah Kasus:</label>
                                <input type="number" name="jumlah_kasus" id="jumlah_kasus" class="form-control" value="{{ $data->jumlah_kasus }}" required>
                            </div>
                            <div class="form-group">
                                <label for="info">Info:</label>
                                <textarea name="info" id="info" class="form-control">{{ $data->info }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude:</label>
                                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $data->latitude }}" required>
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $data->longitude }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('data.superadminindex') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
