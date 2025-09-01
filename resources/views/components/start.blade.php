<style>
    body {
        font-family: 'Tajawal', sans-serif;
        position: relative;
        overflow-x: hidden;
    }

    /* === Hero Section Responsive === */
    .hero-section {
        padding: 100px 20px 80px;
    }

    .hero-content h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 900;
        color: #111;
        margin-bottom: 20px;
        line-height: 1.3;
        animation: fadeInUp 1s ease-out;
    }

    .hero-content p {
        font-size: clamp(1rem, 2.5vw, 1.3rem);
        color: #555;
        margin-bottom: 30px;
        max-width: 500px;
        animation: fadeInUp 1.2s ease-out;
    }

    .hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        animation: fadeInUp 1.4s ease-out;
    }

    .hero-search {
        flex: 1;
        max-width: 420px;
        display: flex;
        border: 1px solid #ddd;
        border-radius: 50px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
    }

    .hero-search input {
        flex: 1;
        border: none;
        outline: none !important;
        padding: 14px 20px;
        font-size: 1rem;
    }

    .hero-search button {
        background: #2563eb;
        border: none;
        color: #fff;
        width: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        /* padding: 0 20px; */
        transition: background 0.3s ease;
    }

    /* CTA Button */
    .hero-cta {
        background: #10b981;
        border: none;
        border-radius: 50px;
        padding: 14px 30px;
        color: #fff;
        font-size: 1.05rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    /* === Responsive Fixes === */
    @media (max-width: 992px) {
        .hero-section {
            padding: 80px 15px 60px;
            text-align: center;
        }

        .hero-content {
            margin-bottom: 40px;
        }

        .hero-actions {
            justify-content: center;
        }

        .hero-search {
            width: 100%;
            max-width: 100%;
        }

        .hero-cta {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .hero-section {
            padding: 60px 10px 40px;
        }

        .hero-content h1 {
            font-size: 1.8rem;
        }

        .hero-content p {
            font-size: 1rem;
        }

        .hero-search input {
            padding: 12px 15px;
            font-size: 0.95rem;
        }

        .hero-cta {
            padding: 12px 20px;
            font-size: 1rem;
        }
    }

    .hero-illustration img {
        width: 100%;
        height: 450px;
        object-fit: cover;
        border-radius: 22px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        animation: floatImage 5s ease-in-out infinite;
    }

    @keyframes floatImage {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .hero-cta {
        background: #10b981;
        padding: 16px 40px;
        font-size: 1.1rem;
        position: relative;
        z-index: 1;
    }

    .hero-cta:hover {
        background: #059669;
        transform: translateY(-3px);
    }

    /* === Animations === */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-section>* {
        position: relative;
        z-index: 1;
    }
</style>
<!-- === Hero Section === -->
<div class="container hero-section">
    <div class="row align-items-center">
        <!-- Left Content -->
        <div class="col-12 col-lg-6 hero-content">
            <h1>ابدأ رحلتك التعليمية<br>نحو مستقبل أقوى</h1>
            <p>منصتك التعليمية المتكاملة: تعلم من أفضل المحاضرين والدورات المتميزة في مختلف المجالات.</p>
            <div class="hero-actions">
                <form method="GET" action="{{ route('blog') }}" class="hero-search">
                    <input type="text" name="q" placeholder="ابحث عن دورة أو موضوع...">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                @auth
                    <a href="{{ route('user.dashboard') }}" class="hero-cta"> لوحه التحكم</a>
                @else
                    <a href="{{ route('register') }}" class="hero-cta">سجل مجانًا</a>
                @endauth
            </div>
        </div>

        <!-- Right Illustration -->
        <div class="col-12 col-lg-6 hero-illustration text-center mt-5 mt-lg-0">
            <img src="{{ url("images/website/bg-hero.jpeg") }}" alt="تعليم">
        </div>
    </div>
</div>
