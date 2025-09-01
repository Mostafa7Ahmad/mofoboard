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

<div class="container py-5">
    <h2 class="display-4 mb-3 text-center section-title">جميع الكورسات</h2>
    <p class="lead text-center mb-10 px-md-16 px-lg-0">
        استكشف مجموعة واسعة من الأقسام التعليمية المصممة لتغطي مختلف التخصصات والمهارات التي تحتاجها.
    </p>
    <div class="row g-4">
        @foreach ($courses as $course)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <x-course-card :course="$course" />
            </div>
        @endforeach
    </div>
</div>
