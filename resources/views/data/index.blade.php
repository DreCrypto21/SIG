<!-- resources/views/data/index.blade.php -->

@extends('layouts.app') <!-- Pastikan layout app Anda sudah terdefinisi -->

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Superadmin Dashboard</div>

                    <div class="card-body">

                        <div class="mb-3">
                            <a href="{{ route('data.create') }}" class="btn btn-primary">Create New Data</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th>Jumlah Kasus</th>
                                    <th>Persentase</th>
                                    <th>Info</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Aksi</th>
                                    <!-- Tambah kolom lain sesuai kebutuhan -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->kecamatan }}</td>
                                        <td>{{ $item->jumlah_kasus }}</td>
                                    
                                        <td>{{ number_format($item->persentase, 2) }}%</td>
                                        <td>{{ $item->info }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>
                                            <a href="{{ route('data.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('data.destroy', ['id' => $item->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                        <!-- Tambah kolom lain sesuai kebutuhan -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
