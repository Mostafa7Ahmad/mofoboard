@extends('layouts.app', ['page_title' => 'test', 'page_description' => 'test'])
@section('content')
    <!-- Breadcrumb Navigation -->

    @php
        $breads = [
            ['title' => 'الكتالوج', 'url' => '#', 'isactive' => false],
            ['title' => 'التكنولوجيا', 'url' => '#', 'isactive' => false],
            ['title' => 'تطوير مواقع الويب الحديثة باستخدام React', 'url' => '', 'isactive' => true],
        ];
    @endphp

    <x-breadcrumb :breads="$breads" />

    <!-- Main Content -->
    <main class="container-xl py-4">
        <!-- Hero Section -->
        <div class="row g-4 mb-4">
            <!-- Video Preview -->
            <div class="col-lg-8">
                <div class="course-hero position-relative rounded-3 overflow-hidden">
                    <img src="https://images.pexels.com/photos/574071/pexels-photo-574071.jpeg?auto=compress&cs=tinysrgb&w=800"
                        alt="معاينة الدورة" class="w-100">
                    <div
                        class="position-absolute top-0 start-0 w-100 h-100 video-overlay d-flex align-items-center justify-content-center">
                        <button id="previewBtn"
                            class="btn btn-light rounded-circle w-10 h-10 d-flex justify-items-center items-center">
                            <i class="fas fa-play text-primary"></i>
                        </button>
                    </div>
                    <span class="position-absolute top-0 m-3  w-auto badge bg-dark bg-opacity-75" style="right:0px">معاينة
                        مجانية</span>
                </div>
            </div>

            <!-- Course Info Card -->
            <div class="col-lg-4">
                <div class="card sticky-card border-light shadow-sm">
                    <div class="card-body">
                        <!-- Price -->
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <p class="fw-bold text-primary">149 ريال</p>
                            <p class="text-muted text-decoration-line-through">299 ريال</p>
                            <span class="badge bg-danger">خصم 50%</span>
                        </div>

                        <!-- Enroll Button -->
                        <button class="btn btn-primary w-100 mb-3">التسجيل في الدورة</button>

                        <!-- Course Stats -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">المستوى</span>
                                <span class="fw-medium">مبتدئ</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">المدة</span>
                                <span class="fw-medium">12 ساعة</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">الدروس</span>
                                <span class="fw-medium">24 درس</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">الطلاب</span>
                                <span class="fw-medium">1,234 طالب</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">اللغة</span>
                                <span class="fw-medium">العربية</span>
                            </div>
                        </div>

                        <!-- Features -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check text-success"></i>
                                <span class="text-muted small">وصول مدى الحياة</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check text-success"></i>
                                <span class="text-muted small">شهادة إتمام</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check text-success"></i>
                                <span class="text-muted small">دعم فني</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check text-success"></i>
                                <span class="text-muted small">ملفات قابلة للتحميل</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2">
                            <button id="bookmarkBtn" class="btn btn-outline-yellow flex-fill"><i
                                    class="far fa-bookmark"></i></button>
                            <button id="shareBtn" class="btn btn-outline-primary flex-fill"><i
                                    class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Title and Instructor -->
        <div class="mb-4">
            <h1 class="h3 fw-bold mb-3">{{ $course->title ?? 'تطوير مواقع الويب الحديثة باستخدام React' }}</h1>
            <p class="text-muted mb-3">تعلم كيفية بناء تطبيقات ويب تفاعلية وحديثة باستخدام مكتبة React الشهيرة مع أفضل
                الممارسات والأدوات الحديثة</p>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="d-flex text-warning">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <span class="small fw-medium">4.8</span>
                    <span class="small text-muted">(1,234 تقييم)</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ url('images/default/avatar.png') }}" alt="المدرب" class="rounded-circle" width="40"
                        height="40">
                    <div>
                        <p class="mb-0 fw-medium">{{ $instructor->name ?? 'أحمد محمد' }}</p>
                        <p class="small text-muted">مطور ويب خبير</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabbed Content -->
        <div class="card border-light shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#overview">نظرة عامة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#curriculum">المنهج</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#instructor">المدرب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#reviews">التقييمات</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-0">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview">
                        <div class="mb-4">
                            <h3 class="h5 fw-bold mb-3">وصف الدورة</h3>
                            <p class="text-muted">
                                هذه الدورة مصممة لتعليمك كيفية بناء تطبيقات ويب حديثة وتفاعلية باستخدام مكتبة React.
                                ستتعلم من الأساسيات وحتى المفاهيم المتقدمة، بما في ذلك إدارة الحالة، التوجيه، والتكامل
                                مع APIs.
                            </p>
                            <p class="text-muted">
                                سنغطي أيضاً أفضل الممارسات في التطوير، أدوات البناء الحديثة، واختبار التطبيقات. بنهاية
                                الدورة، ستكون قادراً على بناء تطبيقات ويب كاملة ومتطورة.
                            </p>
                        </div>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold mb-3">ما ستتعلمه</h3>
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                @foreach (['أساسيات React والمكونات', 'إدارة الحالة باستخدام Hooks', 'التوجيه باستخدام React Router', 'التكامل مع REST APIs', 'أدوات البناء والتطوير', 'اختبار التطبيقات'] as $objective)
                                    <div class="d-flex align-items-start gap-2">
                                        <i class="fas fa-check text-success mt-1"></i>
                                        <span class="text-muted">{{ $objective }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold mb-3">المتطلبات المسبقة</h3>
                            <ul class="list-unstyled">
                                @foreach (['معرفة أساسية بـ HTML و CSS', 'فهم أساسيات JavaScript', 'خبرة في استخدام محرر النصوص'] as $prereq)
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="fas fa-dot-circle text-primary mt-1"></i>
                                        <span class="text-muted">{{ $prereq }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-3 bg-primary bg-opacity-10 border border-primary-subtle rounded">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fas fa-certificate text-primary"></i>
                                <div>
                                    <h4 class="fw-semibold mb-1">شهادة إتمام</h4>
                                    <p class="small text-muted mb-0">احصل على شهادة معتمدة عند إتمام الدورة بنجاح</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Curriculum Tab -->
                    <div class="tab-pane fade" id="curriculum">
                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="h5 fw-bold">محتوى الدورة</h3>
                            <span class="small text-muted">24 درس • 12 ساعة</span>
                        </div>
                        <div class="accordion" id="curriculumAccordion">
                            <!-- Module 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="module1Heading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#module1">
                                        <span class="fw-medium">الوحدة الأولى: مقدمة في React</span>
                                        <span class="ms-auto small text-muted">6 دروس • 3 ساعات</span>
                                    </button>
                                </h2>
                                <div id="module1" class="accordion-collapse collapse show"
                                    data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        @foreach ([['title' => 'ما هو React؟', 'duration' => '15 دقيقة', 'preview' => true], ['title' => 'إعداد بيئة التطوير', 'duration' => '20 دقيقة', 'preview' => false], ['title' => 'أول تطبيق React', 'duration' => '25 دقيقة', 'preview' => false]] as $lesson)
                                            <div class="d-flex justify-content-between py-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i
                                                        class="fas fa-play-circle {{ $lesson['preview'] ? 'text-primary' : 'text-muted' }}"></i>
                                                    <span class="text-muted">{{ $lesson['title'] }}</span>
                                                    @if ($lesson['preview'])
                                                        <span
                                                            class="badge bg-success bg-opacity-10 text-success">معاينة</span>
                                                    @endif
                                                </div>
                                                <span class="small text-muted">{{ $lesson['duration'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Module 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="module2Heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#module2">
                                        <span class="fw-medium">الوحدة الثانية: المكونات والخصائص</span>
                                        <span class="ms-auto small text-muted">8 دروس • 4 ساعات</span>
                                    </button>
                                </h2>
                                <div id="module2" class="accordion-collapse collapse"
                                    data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        @foreach ([['title' => 'إنشاء المكونات', 'duration' => '30 دقيقة'], ['title' => 'تمرير الخصائص', 'duration' => '25 دقيقة']] as $lesson)
                                            <div class="d-flex justify-content-between py-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fas fa-play-circle text-muted"></i>
                                                    <span class="text-muted">{{ $lesson['title'] }}</span>
                                                </div>
                                                <span class="small text-muted">{{ $lesson['duration'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Module 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="module3Heading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#module3">
                                        <span class="fw-medium">الوحدة الثالثة: إدارة الحالة</span>
                                        <span class="ms-auto small text-muted">10 دروس • 5 ساعات</span>
                                    </button>
                                </h2>
                                <div id="module3" class="accordion-collapse collapse"
                                    data-bs-parent="#curriculumAccordion">
                                    <div class="accordion-body">
                                        @foreach ([['title' => 'useState Hook', 'duration' => '35 دقيقة'], ['title' => 'useEffect Hook', 'duration' => '40 دقيقة']] as $lesson)
                                            <div class="d-flex justify-content-between py-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="fas fa-play-circle text-muted"></i>
                                                    <span class="text-muted">{{ $lesson['title'] }}</span>
                                                </div>
                                                <span class="small text-muted">{{ $lesson['duration'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Instructor Tab -->
                    <div class="tab-pane fade" id="instructor">
                        <div class="row g-4">
                            <div class="col-sm-3 text-center">
                                <img src="{{ url('images/default/avatar.png') }}" alt="أحمد محمد"
                                    class="rounded-circle mb-3" width="128" height="128">
                            </div>
                            <div class="col-sm-9">
                                <h3 class="h5 fw-bold mb-1">{{ $instructor->name ?? 'أحمد محمد' }}</h3>
                                <p class="text-muted mb-3">مطور ويب خبير ومدرب معتمد</p>
                                <div class="d-flex flex-wrap gap-3 mb-3">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="small">4.9 تقييم المدرب</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-users text-primary"></i>
                                        <span class="small">15,234 طالب</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="fas fa-play-circle text-success"></i>
                                        <span class="small">25 دورة</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4 class="h6 fw-bold mb-3">نبذة عن المدرب</h4>
                            <p class="text-muted">
                                أحمد محمد هو مطور ويب خبير مع أكثر من 8 سنوات من الخبرة في تطوير التطبيقات الحديثة. يعمل
                                كمطور رئيسي في إحدى الشركات التقنية الرائدة ولديه شغف كبير بتعليم التكنولوجيا.
                            </p>
                            <p class="text-muted">
                                حاصل على شهادات متعددة في تطوير الويب وقد ساعد آلاف الطلاب على تعلم البرمجة وتطوير
                                مهاراتهم التقنية. يتميز بأسلوبه الواضح والمبسط في الشرح.
                            </p>
                        </div>
                        <div class="mt-4">
                            <h4 class="h6 fw-bold mb-3">مجالات الخبرة</h4>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach (['React', 'JavaScript', 'Node.js', 'TypeScript', 'MongoDB', 'AWS'] as $skill)
                                    <span class="badge bg-primary bg-opacity-10 text-primary">{{ $skill }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews">
                        <div class="row g-4 p-3 bg-light rounded">
                            <div class="col-sm-3 text-center">
                                <div class="fs-2 fw-bold mb-2">4.8</div>
                                <div class="d-flex justify-content-center text-warning mb-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <div class="small text-muted">1,234 تقييم</div>
                            </div>
                            <div class="col-sm-9">
                                @foreach ([75, 20, 3, 1, 1] as $index => $percent)
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <span class="small" style="width: 2rem">{{ 5 - $index }}</span>
                                        <div class="progress flex-fill" style="height: 8px;">
                                            <div class="progress-bar bg-warning" style="width: {{ $percent }}%">
                                            </div>
                                        </div>
                                        <span class="small text-muted" style="width: 3rem">{{ $percent }}%</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-4">
                            @foreach ([['name' => 'محمد علي', 'rating' => 5, 'date' => 'منذ أسبوعين', 'text' => 'دورة ممتازة جداً! الشرح واضح ومفصل، والأمثلة العملية مفيدة جداً. تعلمت الكثير وأصبحت قادراً على بناء تطبيقات React بثقة. أنصح بها بشدة لكل من يريد تعلم React.', 'avatar' => url('images/default/avatar.png')], ['name' => 'فاطمة أحمد', 'rating' => 4, 'date' => 'منذ شهر', 'text' => 'المدرب أحمد رائع في الشرح ويجعل المفاهيم المعقدة سهلة الفهم. الدورة منظمة بشكل ممتاز وتتدرج من البسيط إلى المعقد. الشيء الوحيد أنني كنت أتمنى المزيد من التمارين العملية.', 'avatar' => url('images/default/avatar.png')], ['name' => 'خالد السعيد', 'rating' => 5, 'date' => 'منذ 3 أسابيع', 'text' => 'أفضل دورة React باللغة العربية! المحتوى محدث ويغطي أحدث الممارسات. المشاريع العملية ممتازة وتساعد على تطبيق ما تعلمته. حصلت على وظيفة مطور React بعد إنهاء الدورة.', 'avatar' => url('images/default/avatar.png')]] as $review)
                                <div class="border-bottom py-3">
                                    <div class="d-flex gap-3">
                                        <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}"
                                            class="rounded-circle" width="48" height="48">
                                        <div class="flex-fill">
                                            <div class="d-flex align-items-center gap-2 mb-2">
                                                <span class="fw-medium">{{ $review['name'] }}</span>
                                                <div class="d-flex text-warning">
                                                    @for ($i = 0; $i < $review['rating']; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                    @for ($i = $review['rating']; $i < 5; $i++)
                                                        <i class="far fa-star"></i>
                                                    @endfor
                                                </div>
                                                <span class="small text-muted">{{ $review['date'] }}</span>
                                            </div>
                                            <p class="text-muted">{{ $review['text'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-success">عرض المزيد من التقييمات</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $courses = collect([
                [
                    'id' => 1,
                    'slug' => 'laravel-basics',
                    'title' => 'أساسيات Laravel',
                    'excerpt' => 'تعلم كيفية بناء تطبيقات ويب باستخدام Laravel خطوة بخطوة.',
                    'instructor_name' => 'مصطفى أحمد',
                    'image_url' => url('images/website/courses/1.jpeg'),
                    'price' => 499,
                    'old_price' => 799,
                    'is_free' => false,
                    'rating' => 4.7,
                    'students_count' => 120,
                    'duration' => '12 ساعة',
                    'tags' => ['Laravel', 'PHP', 'Backend'],
                ],
                [
                    'id' => 2,
                    'slug' => 'react-advanced',
                    'title' => 'React متقدم',
                    'excerpt' => 'الدخول في مستوى متقدم مع React وبناء تطبيقات SPA.',
                    'instructor_name' => 'أحمد علي',
                    'image_url' => url('images/website/courses/2.webp'),
                    'price' => 699,
                    'old_price' => 999,
                    'is_free' => false,
                    'rating' => 4.3,
                    'students_count' => 340,
                    'duration' => '20 ساعة',
                    'tags' => ['React', 'JavaScript', 'Frontend'],
                ],
                [
                    'id' => 3,
                    'slug' => 'css-master',
                    'title' => 'احتراف CSS',
                    'excerpt' => 'من البداية إلى الاحتراف لتصميم واجهات مستخدم مذهلة.',
                    'instructor_name' => 'سارة محمد',
                    'image_url' => url('images/website/courses/3.webp'),
                    'price' => null,
                    'old_price' => null,
                    'is_free' => true,
                    'rating' => 4.9,
                    'students_count' => 800,
                    'duration' => '8 ساعات',
                    'tags' => ['CSS', 'Frontend', 'UI/UX'],
                ],
                [
                    'id' => 4,
                    'slug' => 'fullstack-roadmap',
                    'title' => 'مسار Fullstack',
                    'excerpt' => 'دورة شاملة تغطي Backend وFrontend من الصفر للاحتراف.',
                    'instructor_name' => 'عمر خالد',
                    'image_url' => url('images/website/courses/4.jpeg'),
                    'price' => 999,
                    'old_price' => null,
                    'is_free' => false,
                    'rating' => 4.5,
                    'students_count' => 560,
                    'duration' => '35 ساعة',
                    'tags' => ['Fullstack', 'Node.js', 'React', 'Laravel'],
                ],
            ]);
        @endphp

        <!-- Related Courses -->
        <section class="mt-5">
            <h2 class="h4 fw-bold mb-4">دورات ذات صلة</h2>
            <div class="row g-4">
                @foreach ($courses as $course)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <x-course-card :course="$course" />
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <!-- Sticky Bottom Bar (Mobile) -->
    <div class="d-md-none fixed-bottom bg-white border-top p-3 bottom-bar">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <p class="fw-bold text-primary">149 ريال</p>
                    <p class="text-muted text-decoration-line-through">299 ريال</p>
                </div>
                <span class="small text-muted">خصم 50% لفترة محدودة</span>
            </div>
            <button class="btn btn-primary">التسجيل الآن</button>
        </div>
    </div>

    <!-- Course Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">معاينة الدورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9 mb-3">
                        <video controls
                            poster="https://images.pexels.com/photos/574071/pexels-photo-574071.jpeg?auto=compress&cs=tinysrgb&w=800">
                            <source src="#" type="video/mp4">
                            متصفحك لا يدعم تشغيل الفيديو.
                        </video>
                    </div>
                    <p class="text-muted text-center mb-3">هذه معاينة مجانية من الدورة. للوصول إلى المحتوى الكامل، يرجى
                        التسجيل في الدورة.</p>
                    <div class="text-center">
                        <button class="btn btn-primary">التسجيل في الدورة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Share Modal -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">مشاركة الدورة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-secondary d-flex align-items-center gap-3">
                            <i class="fab fa-whatsapp text-success fs-5"></i>
                            <span>مشاركة عبر واتساب</span>
                        </button>
                        <button class="btn btn-outline-secondary d-flex align-items-center gap-3">
                            <i class="fab fa-twitter text-primary fs-5"></i>
                            <span>مشاركة عبر تويتر</span>
                        </button>
                        <button class="btn btn-outline-secondary d-flex align-items-center gap-3">
                            <i class="fab fa-facebook text-primary fs-5"></i>
                            <span>مشاركة عبر فيسبوك</span>
                        </button>
                        <button id="copyLink" class="btn btn-outline-secondary d-flex align-items-center gap-3">
                            <i class="fas fa-link text-muted fs-5"></i>
                            <span>نسخ الرابط</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
