@extends('layouts.user')

@section('user-content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-9 mb-4">

                <!-- Welcome Banner -->
                <div class="card text-white mb-4" style="background: linear-gradient(to left, #6f42c1, #563d7c);">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-2 text-white">مرحباً، {{ auth()->user()->name }}!</h4>
                            <p class="mb-0 text-white">استمر في رحلة التعلم وحقق أهدافك </p>
                        </div>
                        <div class="d-flex gap-4 text-center mt-3 mt-md-0 text-white">
                            {{-- <div>
                                <h5 class="fw-bold mb-0 text-white">12</h5>
                                <small class=" text-white">دورة مسجلة</small>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-white">8</h5>
                                <small class=" text-white">دورة مكتملة</small>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0 text-white">156</h5>
                                <small class=" text-white">ساعة تعلم</small>
                            </div> --}}
                        </div>
                    </div>
                </div>


                <!-- Continue Learning -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold">استمر في التعلم</h5>
                    <a href="/" class="text-decoration-none text-primary small">عرض الكل <i
                            class="fa fa-arrow-left"></i></a>
                </div>

                <div class="row g-4">
                    <!-- Course Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ url('images/website/courses/2.webp') }}" class="card-img-top" alt="course">
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-truncate">تطوير مواقع الويب الحديثة باستخدام React</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ url('images/default/avatar.png') }}" class="rounded-circle me-2"
                                        width="24" height="24" alt="">
                                    <small class="text-muted">أحمد محمد</small>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small">
                                        <span>التقدم</span>
                                        <span>9 من 12 درس</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted">
                                    <small><i class="fa fa-clock me-1"></i> الدرس التالي: 25 دقيقة</small>
                                    <a href="/" class="btn btn-sm btn-primary">متابعة</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Course Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ url('images/website/courses/3.webp') }}" class="card-img-top" alt="course">
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-truncate">تطوير مواقع الويب الحديثة باستخدام React</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ url('images/default/avatar.png') }}" class="rounded-circle me-2"
                                        width="24" height="24" alt="">
                                    <small class="text-muted">أحمد محمد</small>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small">
                                        <span>التقدم</span>
                                        <span>9 من 12 درس</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted">
                                    <small><i class="fa fa-clock me-1"></i> الدرس التالي: 25 دقيقة</small>
                                    <a href="/" class="btn btn-sm btn-primary">متابعة</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Course Card -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100">
                            <img src="{{ url('images/website/courses/4.jpeg') }}" class="card-img-top" alt="course">
                            <div class="card-body p-3">
                                <h6 class="fw-bold text-truncate">تطوير مواقع الويب الحديثة باستخدام React</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <img src="{{ url('images/default/avatar.png') }}" class="rounded-circle me-2"
                                        width="24" height="24" alt="">
                                    <small class="text-muted">أحمد محمد</small>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-between small">
                                        <span>التقدم</span>
                                        <span>9 من 12 درس</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between small text-muted">
                                    <small><i class="fa fa-clock me-1"></i> الدرس التالي: 25 دقيقة</small>
                                    <a href="/" class="btn btn-sm btn-primary">متابعة</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تقدر تكرر نفس الكارد مع تعديلات -->

                </div>

                <!-- Achievements -->
                <div class="mt-5">
                    <h5 class="fw-bold mb-3">الإنجازات الأخيرة</h5>
                    <div class="row g-3">
                        <div class="col-6 col-lg-3">
                            <div class="card text-center p-3 shadow-sm">
                                <div class="bg-light rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa fa-trophy text-warning"></i>
                                </div>
                                <h6 class="fw-bold mb-1">دورة مكتملة</h6>
                                <small class="text-muted">أكملت دورة JavaScript</small>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="card text-center p-3 shadow-sm">
                                <div class="bg-light rounded-circle d-flex justify-content-center align-items-center mx-auto mb-2"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa fa-certificate text-success"></i>
                                </div>
                                <h6 class="fw-bold mb-1">شهادة جديدة</h6>
                                <small class="text-muted">شهادة في تطوير الويب</small>
                            </div>
                        </div>
                        <!-- كرر باقي الإنجازات -->
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-5">
                        <h6 class="fw-bold mb-3">إحصائيات سريعة</h6>
                        <ul class="list-unstyled small">
                            <li class="d-flex justify-content-between mb-2"><span>ساعات المشاهدة</span><span
                                    class="fw-bold">156</span></li>
                            <li class="d-flex justify-content-between mb-2"><span>دروس مكتملة</span><span
                                    class="fw-bold">89</span></li>
                            <li class="d-flex justify-content-between mb-2"><span>الشهادات</span><span
                                    class="fw-bold">8</span></li>
                            <li class="d-flex justify-content-between"><span>سلسلة التعلم</span><span class="fw-bold">15
                                    يوم</span></li>
                        </ul>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h6 class="fw-bold mb-3">إجراءات سريعة</h6>
                        <div class="d-grid gap-2">
                            <a href="/" class="btn btn-outline-primary"><i class="fa fa-bookmark me-2"></i>
                                المفضلة</a>
                            <a href="/" class="btn btn-outline-success"><i class="fa fa-download me-2"></i>
                                التحميلات</a>
                            <a href="/" class="btn btn-outline-warning"><i class="fa fa-comments me-2"></i>
                                المناقشات</a>
                            <a href="/" class="btn btn-outline-danger"><i class="fa fa-clipboard-check me-2"></i>
                                الاختبارات</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
