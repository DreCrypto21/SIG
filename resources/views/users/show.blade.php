@extends('layouts.app')

@section('content')
<div class="container-fluid py-5" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow" style="background-color: rgba(255, 255, 255, 0.9);">
                <div class="card-header bg-white py-3">
                    <h2 class="mb-0">Profil Pengguna</h2>
                </div>
                <div class="card-body p-4">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-4 text-center">
                            @if ($user->photo)
                                <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm mx-auto" style="width: 120px; height: 120px;">
                                    <i class="fas fa-user fa-3x text-secondary"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3 class="mb-1">{{ $user->name }}</h3>
                            <p class="text-muted mb-2">{{ $user->email }}</p>
                            <span class="badge bg-primary">{{ $user->role }}</span>
                        </div>
                    </div>

                    <div class="border-top pt-4">
                        <h4 class="mb-3">Informasi Akun</h4>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <p class="mb-1 text-muted small">Dibuat Pada</p>
                                <p class="mb-0 fw-bold">{{ $user->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <p class="mb-1 text-muted small">Diperbarui Pada</p>
                                <p class="mb-0 fw-bold">{{ $user->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-end py-3">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-1"></i> Perbarui Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection