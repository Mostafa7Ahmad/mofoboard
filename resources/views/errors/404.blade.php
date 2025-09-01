@extends('layouts.app')

@section('content')
<div class="error-page d-flex align-items-center justify-content-center text-center">
    <div>
        <h1 class="error-code">404</h1>
        <h3 class="mb-3">الصفحة غير موجودة</h3>
        <p class="text-muted mb-4">
            يبدو أنك وصلت إلى رابط غير صحيح أو الصفحة قد تمت إزالتها.
        </p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg rounded-pill px-5">
            <i class="fas fa-home me-2"></i> العودة للرئيسية
        </a>
    </div>
</div>

<style>
	body {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef) !important;
	}

    .error-page {
        min-height: 90vh;
        padding: 40px;
    }

    .error-code {
        font-size: 8rem;
        font-weight: 800;
        color: #0d6efd;
        line-height: 1;
        margin-bottom: 20px;
    }

    .error-page h3 {
        font-size: 1.75rem;
        font-weight: 600;
        color: #212529;
    }

    .error-page p {
        font-size: 1rem;
        color: #6c757d;
    }

    .btn-primary {
        background: #0d6efd;
        border: none;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: #0b5ed7;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(13, 110, 253, 0.3);
    }
</style>
@endsection
