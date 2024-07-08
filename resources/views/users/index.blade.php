@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-dark-teal text-center text-dark">
                    <h4 class="mb-0">Daftar Pengguna</h4>
                </div>
                

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            <i class="fas fa-user-plus me-2"></i>Tambah Pengguna Baru
                        </a>
                        @if (session('success'))
                            <div class="alert alert-success mb-0 py-2 px-4">{{ session('success') }}</div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->photo)
                                                <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" width="50" height="50">
                                            @else
                                                <img src="{{ asset('images/default-profile.png') }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" width="50" height="50">
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning me-2">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pengguna ini?')">
                                                        <i class="fas fa-trash-alt me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data pengguna</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-container d-flex justify-content-center">
                            {{ $users->links('pagination::simple-bootstrap-4') }}
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
    .table th, .table td {
        vertical-align: middle;
    }
    .table td:last-child {
        width: 200px;
    }
    .btn {
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
    }
</style>
@endpush
