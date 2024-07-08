@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-sm-8">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                            <p><strong>Member Since:</strong> {{ $user->created_at->format('d M Y') }}</p>
                            <p><strong>Last Updated:</strong> {{ $user->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-between">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
