@extends('layouts.app')

@section('content')
    <div class="error-page d-flex align-items-center justify-content-center text-center">
        <div class="error-box">
            <div class="error-icon mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#0d6efd" viewBox="0 0 16 16">
                    <path
                        d="M7.938 2.016a.13.13 0 0 1 .125 0l6.857 3.941c.108.062.18.177.18.303v7.48c0 .126-.072.24-.18.303l-6.857 3.94a.13.13 0 0 1-.125 0l-6.857-3.94A.34.34 0 0 1 .9 13.74V6.26c0-.126.072-.24.18-.303l6.857-3.94z" />
                </svg>
            </div>
            <h3 class="fw-bold mb-3">حدث خطأ أثناء معالجة طلبك</h3>
            <p class="text-muted mb-4">
                لا تقلق، يعمل فريقنا على حل المشكلة في الوقت الحالي.<br>
                يمكنك إعادة تحديث الصفحة والمحاولة مرة أخرى.
            </p>
            <a href="{{ url()->current() }}" class="btn btn-primary btn-lg rounded-pill px-5">
                <i class="fas fa-sync-alt me-2"></i> تحديث الصفحة
            </a>
        </div>
    </div>

    <style>
        .error-page {
            min-height: 90vh;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 40px;
        }

        .error-box {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .error-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .error-icon svg {
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
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
