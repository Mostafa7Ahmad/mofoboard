@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">

            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas mx-1fa-courses"></span> كورسات
                    </div>
                    <div class="col-12 col-lg-4 p-0">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('courses-create')
                            <a href="{{ route('admin.courses.create') }}">
                                <span class="btn btn-primary"><span class="fas mx-1fa-plus"></span> إضافة جديد</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>

            <div class="col-12 py-2 px-2 row">
                <div class="col-12 col-lg-4 p-2">
                    <form method="GET">
                        <input type="text" name="q" class="form-control" placeholder="بحث ... "
                            value="{{ request()->get('q') }}">
                    </form>
                </div>
            </div>
            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;min-height:50dvh">
                    <table class="table table-bordered  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المستخدم</th>
                                {{-- <th>الشعار</th> --}}
                                <th>العنوان</th>
                                {{-- <th>مميز</th> --}}
                                {{-- <th>زيارات</th> --}}
                                <th>تحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->user->name }}</td>
                                    {{-- <td><img src="{{ $course->main_image() }}" style="width:40px"></td> --}}
                                    <td>{{ $course->title }}</td>
                                    {{-- <td>
                                        @if ($course->is_featured == 1)
                                            <span class="fas mx-1fa-check-circle text-success"></span>
                                        @endif
                                    </td> --}}
                                    {{-- <td>{{ $course->views }}</td> --}}
                                    <td style="width: 1%;text-wrap: nowrap;">
                                        @include('components.control', [
                                            'links' => [
                                                [
                                                    'text' => 'عرض',
                                                    'icon' => 'fal fa-search',
                                                    'can' => 'courses-read',
                                                    'url' => route('admin.courses.show', ['course' => $course]),
                                                ],
                                                [
                                                    'text' => 'تعديل',
                                                    'icon' => 'fal fa-edit',
                                                    'can' => 'courses-update',
                                                    'url' => route('admin.courses.edit', ['course' => $course]),
                                                ],
                                        
                                                [
                                                    'text' => 'حذف',
                                                    'icon' => 'fal fa-trash-can',
                                                    'can' => 'courses-delete',
                                                    'url' => route('admin.courses.destroy', [
                                                        'course' => $course,
                                                    ]),
                                                    'method' => 'DELETE',
                                                ],
                                            ],
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
                {{ $courses->appends(request()->query())->render() }}
            </div>
        </div>
    </div>
@endsection
