@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Role:</strong> {{ $user->role }}</p>
                    <p><strong>Created At:</strong> {{ $user->created_at->format('d M Y H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $user->updated_at->format('d M Y H:i:s') }}</p>
                </div>

                <div class="card-footer">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Perbaharui profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
