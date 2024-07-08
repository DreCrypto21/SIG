@extends('layouts.app')

@section('content')
<div class="card-body p-4">
    <div class="row">
        <div class="col-md-4 text-center mb-4 mb-md-0">
            @if ($user->photo)
                <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }}" class="img-fluid rounded-circle shadow" style="width: 200px;">
            @else
                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 200px; height: 200px;">
                    <i class="fas fa-user fa-5x text-secondary"></i>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <h3 class="border-bottom pb-2 mb-3">Informasi Pribadi</h3>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Nama:</strong></div>
                <div class="col-sm-8">{{ $user->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Email:</strong></div>
                <div class="col-sm-8">{{ $user->email }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-4"><strong>Role:</strong></div>
                <div class="col-sm-8"><span class="badge bg-info">{{ $user->role }}</span></div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h3 class="border-bottom pb-2 mb-3">Riwayat Akun</h3>
        <div class="row mb-2">
            <div class="col-sm-4"><strong>Dibuat Pada:</strong></div>
            <div class="col-sm-8">{{ $user->created_at->format('d M Y H:i:s') }}</div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-4"><strong>Diperbarui Pada:</strong></div>
            <div class="col-sm-8">{{ $user->updated_at->format('d M Y H:i:s') }}</div>
        </div>
    </div>
</div>

<div class="card-footer bg-light text-center py-3">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">
        <i class="fas fa-edit me-2"></i> Perbarui Profil
    </a>
</div>
@endsection
