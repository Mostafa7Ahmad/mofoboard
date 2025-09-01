@extends('layouts.app')

@section('styles')
    <style>
        /* === Category Cards === */
        .category-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #eee;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #2563eb, #10b981);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card:hover::before {
            opacity: 1;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            height: 90px;
            width: 90px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 18px;
            transition: transform 0.3s ease;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }

        .category-card h4 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #111827;
        }

        /* === Features Section === */
        .feature-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #eee;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            height: 100%;
            position: relative;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .feature-card img {
            height: 90px;
            width: 90px;
            object-fit: contain;
            margin-bottom: 18px;
            transition: transform 0.3s ease;
        }

        .feature-card:hover img {
            transform: rotate(10deg) scale(1.1);
        }

        .feature-card h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 12px;
            text-align: center;
        }

        .feature-card p {
            font-size: 1rem;
            color: #555;
        }

        /* === Testimonials Section === */
        .testimonial-card {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            border: 1px solid #eee;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
            position: relative;
        }

        .testimonial-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card img {
            height: 70px;
            width: 70px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 16px;
            border: 2px solid #2563eb;
        }

        .testimonial-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 16px;
        }

        .testimonial-card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #111827;
        }

        .testimonial-card span {
            font-size: 0.9rem;
            color: #777;
        }

        /* === CTA Section === */
        .cta-section {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            border-radius: 16px;
            padding: 60px 20px;
            text-align: center;
            color: #fff;
            margin: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ url('images/components/decor/pattern.png') }}') repeat;
            opacity: 0.1;
            z-index: 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            animation: fadeIn 1s ease-out;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }
    </style>
@endsection

@section('content')
    <main>
        @include('components.start')
        {{-- <!-- === Categories Section === -->
        <section class="wrapper">
            <div class="container py-5">
                <h2 class="display-4 mb-3 text-center section-title">الأقسام التعليمية</h2>
                <p class="lead text-center mb-10 px-md-16 px-lg-0">
                    استكشف مجموعة واسعة من الأقسام التعليمية المصممة لتغطي مختلف التخصصات والمهارات التي تحتاجها.
                </p>
                <div class="row">
                    @php
                        $categories = \App\Models\Category::orderBy('id', 'ASC')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <a href="{{ route('category.show', $category) }}">
                                <div class="category-card">
                                    <img src="{{ $category->image() }}" alt="{{ $category->title }}">
                                    <h4 class="text-center">{{ $category->title }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}

        <!-- === Features Section === -->
        <section class="wrapper">
            <div class="container py-5">
                <h2 class="display-4 mb-3 text-center section-title">لماذا تختار منصتنا؟</h2>
                <p class="lead text-center mb-10 px-md-16 px-lg-0">
                    نقدم لك تجربة تعليمية متكاملة، تجمع بين المرونة والجودة والمصداقية، لتكون خطوتك الأولى نحو النجاح.
                </p>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <img src="{{ url('images/components/images/courses.png') }}" alt="تعلم مرن">
                            <h4>تعلم مرن</h4>
                            <p>تعلم في أي وقت ومن أي مكان باستخدام جهازك المفضل، مع دورات مصممة لتناسب جدولك.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <img src="{{ url('images/components/images/learning.png') }}" alt="مدرسون خبراء">
                            <h4>مدرسون خبراء</h4>
                            <p>تعلم من محاضرين ذوي خبرة عالية في مجالاتهم، مع محتوى تعليمي عالي الجودة.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="feature-card">
                            <img class="" src="{{ url('images/components/images/certificate.png') }}"
                                alt="شهادات معتمدة">
                            <h4>شهادات معتمدة</h4>
                            <p>احصل على شهادات معتمدة عند إتمام الدورات لتعزيز سيرتك الذاتية.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('sections.courses')

        <!-- === Testimonials Section === -->
        <section class="wrapper">
            <div class="container py-5">
                <h2 class="display-4 mb-3 text-center section-title">ماذا يقول طلابنا؟</h2>
                <p class="lead text-center mb-10 px-md-16 px-lg-0">
                    آراء وتجارب حقيقية من طلابنا الذين استفادوا من منصتنا التعليمية وحققوا نتائج ملموسة.
                </p>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="testimonial-card">
                            <img src="/assets/img/avatars/team3.jpg" alt="طالب 1">
                            <p>"لقد ساعدتني هذه المنصة في تحسين مهاراتي البرمجية بشكل كبير!"</p>
                            <h5>أحمد محمد</h5>
                            <span>طالب برمجة</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="testimonial-card">
                            <img src="/assets/img/avatars/team2.jpg" alt="طالب 2">
                            <p>"الدورات مرنة ومصممة بشكل رائع، أنصح بها بشدة."</p>
                            <h5>سارة عبدالله</h5>
                            <span>مصممة جرافيك</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="testimonial-card">
                            <img src="/assets/img/avatars/team3.jpg" alt="طالب 3">
                            <p>"حصلت على شهادة معتمدة ساعدتني في الحصول على وظيفة أحلامي."</p>
                            <h5>محمد علي</h5>
                            <span>مهندس شبكات</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('components.faqs')

        <!-- === CTA Section === -->
        <div class="container mx-auto cta-section">
            <h2 class="text-center text-white">انضم إلينا اليوم</h2>
            <p>ابدأ رحلتك التعليمية الآن واكتشف عالمًا من المعرفة مع دوراتنا المتنوعة والمصممة خصيصًا لك.</p> <a
                href="{{ route('register') }}" class="hero-cta">سجل الآن</a>
        </div>

        <!-- === Contact Section === -->
        <section class="wrapper">
            <div class="container py-5">
                <h2 class="display-4 mb-3 text-center section-title">تواصل معنا</h2>
                <p class="lead text-center mb-10 px-md-16 px-lg-0">
                    نحن هنا للرد على استفساراتك ومساعدتك في كل ما تحتاجه. لا تتردد في التواصل معنا في أي وقت.
                </p>
                @include('components.contact')
            </div>
        </section>
    </main>
@endsection
