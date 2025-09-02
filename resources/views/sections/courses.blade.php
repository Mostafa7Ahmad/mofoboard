<div class="container py-5">
    <h2 class="display-4 mb-3 text-center section-title">أحدث الدورات التعليمية</h2>
    <p class="lead text-center mb-10 px-md-16 px-lg-0">
        استكشف مجموعة واسعة من الدورات التعليمية المصممة لتغطي مختلف التخصصات والمهارات التي تحتاجها.
    </p>
    <div class="row g-4">
        @forelse ($courses as $course)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <x-course-card :course="$course" />
            </div>
        @empty
            <p class="text-center">لا توجد دورات مضافة حالياً.</p>
        @endforelse
        <div class="text-center mt-4">
            <a href="#" class="btn btn-blue">عرض الكل</a>
        </div>
    </div>
</div>
