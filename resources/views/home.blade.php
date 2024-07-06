@if (Auth::user()->role == 'admin')

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="text-center mb-4">
                        <i class="fas fa-user-circle fa-4x text-primary"></i>
                    </div>

                    <h5 class="text-center mb-4">{{ __('Welcome back!') }}</h5>

                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-cog me-2"></i>{{ __('Account Settings') }}
                        </a>
                        <a href="#" class="btn btn-outline-secondary">
                            <i class="fas fa-history me-2"></i>{{ __('Activity Log') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif
