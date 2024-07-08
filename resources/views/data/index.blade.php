@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark-teal text-center text-dark">
                    <h4 class="mb-0">Daftar Kecamatan</h4>
                </div>
                

                <div class="card-body">
                    <div class="mb-4">
                        <a href="{{ route('data.create') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle me-2"></i>Tambah Kecamatan
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Jumlah Kasus</th>
                                    <th>Persentase</th>
                                    <th>Info</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key => $item)
                                    <tr>
                                        <td>{{ $data->firstItem() + $key }}</td>
                                        <td>{{ $item->kecamatan }}</td>
                                        <td>{{ number_format($item->jumlah_kasus) }}</td>
                                        <td>{{ number_format($item->persentase, 2) }}%</td>
                                        <td>{{ $item->info }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('data.edit', ['id' => $item->id]) }}" class="btn btn-warning me-2">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('data.destroy', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-container d-flex justify-content-center">
                            {{ $data->links('pagination::simple-bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
   .table th,.table td {
        vertical-align: middle;
    }
   .table td:last-child {
        width: 200px;
    }
   .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
    }
   .bg-dark-teal {
        background-color: #0097A7; /* dark teal color */
    }
</style>
@endpush