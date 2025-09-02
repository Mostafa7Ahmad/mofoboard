@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{ route('admin.courses.update', $course) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{ uniqid() }}">

            <div class="col-12 col-lg-8 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle mx-2"></span> تعديل دورة
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>

                <div class="col-12 p-3 row">

                    {{-- القسم --}}
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">القسم</div>
                        <div class="col-12 pt-2">
                            <select class="form-control select2-select" name="category_id" required>
                                <option value="">اختر القسم</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($course->category_id == $category->id)>{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- الرابط --}}
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">الرابط (Slug)</div>
                        <div class="col-12 pt-2">
                            <input type="text" name="slug" required maxlength="190" class="form-control" value="{{ $course->slug }}">
                        </div>
                    </div>

                    {{-- العنوان --}}
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">العنوان</div>
                        <div class="col-12 pt-2">
                            <input type="text" name="title" required maxlength="190" class="form-control" value="{{ $course->title }}">
                        </div>
                    </div>

                    {{-- الصورة الرئيسية --}}
                    <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">الصورة الرئيسية</div>
                        <div class="col-12 pt-2">
                            <input type="file" name="main_image" class="filepond" accept="image/*">
                        </div>
                        @if($course->main_image)
                        <div class="col-12 pt-2">
                            <img src="{{ asset('uploads/courses/'.$course->main_image) }}" style="width:100px" alt="Main Image">
                        </div>
                        @endif
                    </div>

                    {{-- الأسعار --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">السعر الأصلي</div>
                        <div class="col-12 pt-2">
                            <input type="number" name="original_price" step="0.01" class="form-control" value="{{ $course->original_price }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">السعر بعد الخصم</div>
                        <div class="col-12 pt-2">
                            <input type="number" name="discounted_price" step="0.01" class="form-control" value="{{ $course->discounted_price }}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">نسبة الخصم (%)</div>
                        <div class="col-12 pt-2">
                            <input type="number" name="discount_percent" class="form-control" value="{{ $course->discount_percent }}">
                        </div>
                    </div>

                    {{-- المستوى --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">المستوى</div>
                        <div class="col-12 pt-2">
                            <select name="difficulty_level" class="form-control">
                                <option value="beginner" @selected($course->difficulty_level == 'beginner')>مبتدئ</option>
                                <option value="intermediate" @selected($course->difficulty_level == 'intermediate')>متوسط</option>
                                <option value="advanced" @selected($course->difficulty_level == 'advanced')>متقدم</option>
                            </select>
                        </div>
                    </div>

                    {{-- المدة --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">المدة</div>
                        <div class="col-12 pt-2">
                            <input type="text" name="duration" class="form-control" value="{{ $course->duration }}">
                        </div>
                    </div>

                    {{-- عدد الدروس --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">عدد الدروس</div>
                        <div class="col-12 pt-2">
                            <input type="number" name="lessons_count" class="form-control" value="{{ $course->lessons_count }}">
                        </div>
                    </div>

                    {{-- اللغة --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">اللغة</div>
                        <div class="col-12 pt-2">
                            <input type="text" name="language" class="form-control" value="{{ $course->language }}">
                        </div>
                    </div>

                    {{-- المميزات --}}
                    <div class="col-12 col-lg-12 p-2">
                        <div class="col-12">المميزات</div>
                        <div class="col-12 pt-2 row">

                            <div class="col-12 col-md-6 d-flex align-items-center mb-3">
                                <p class="text-start m-0 flex-grow-1">وصول مدى الحياة</p>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="lifetime_access" value="1" @checked($course->lifetime_access)>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-center mb-3">
                                <p class="text-start m-0 flex-grow-1">شهادة إتمام</p>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="certificate" value="1" @checked($course->certificate)>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-center mb-3">
                                <p class="text-start m-0 flex-grow-1">دعم فني</p>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="support" value="1" @checked($course->support)>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-flex align-items-center mb-3">
                                <p class="text-start m-0 flex-grow-1">ملفات قابلة للتحميل</p>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="downloadable_files" value="1" @checked($course->downloadable_files)>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- الوصف --}}
                    <div class="col-12 p-2">
                        <div class="col-12">الوصف</div>
                        <div class="col-12 pt-2">
                            <textarea name="description" class="editor with-file-explorer" style="min-height:200px">{{ $course->description }}</textarea>
                        </div>
                    </div>

                    {{-- النشر --}}
                    <div class="col-12 col-lg-4 p-2">
                        <div class="col-12">حالة النشر</div>
                        <div class="col-12 pt-2">
                            <select name="is_published" class="form-control">
                                <option value="0" @selected($course->is_published == 0)>مسودة</option>
                                <option value="1" @selected($course->is_published == 1)>منشور</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection
