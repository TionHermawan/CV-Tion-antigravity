@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-12 col-md-8">
        <!-- Breadcrumbs Navigation -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('cv.profile') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item text-muted">Portfolio</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
            </ol>
        </nav>
        
        <div class="card shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                <span class="badge bg-primary mb-2">Portofolio</span>
                <h1 class="display-6 fw-bold text-dark mb-3">{{ $data['title'] }}</h1>
                <h6 class="text-muted mb-4">Slug URL: <code>{{ $slug }}</code></h6>
                <div class="border-top pt-3">
                    <p class="lead text-secondary" style="line-height: 1.8;">
                        {{ $data['description'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
