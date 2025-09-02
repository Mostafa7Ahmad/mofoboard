<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class BackendCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:courses-create', ['only' => ['create', 'store']]);
        $this->middleware('can:courses-read', ['only' => ['show', 'index']]);
        $this->middleware('can:courses-update', ['only' => ['edit', 'update']]);
        $this->middleware('can:courses-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $courses = Course::query()
            ->when($request->id, fn($q) => $q->where('id', $request->id))
            ->when(
                $request->q,
                fn($q) =>
                $q->where(function ($q) use ($request) {
                    $q->where('title', 'LIKE', "%{$request->q}%")
                        ->orWhere('description', 'LIKE', "%{$request->q}%");
                })
            )
            ->latest()
            ->paginate();

        return view('admin.courses.index', compact('courses'));
    }

    public function show()
    {
        
    }

    public function create()
    {
        $categories = \App\Models\Category::latest('id')->get();
        return view('admin.courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateCourse($request);
        $data['main_image'] = $this->handleImageUpload($request);

        Course::create($this->prepareCheckboxes($request, $data));

        flash()->success('تم إنشاء الدورة بنجاح');
        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        $categories = \App\Models\Category::latest('id')->get();
        return view('admin.courses.edit', compact('categories', 'course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $this->validateCourse($request, $course->id);
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $this->handleImageUpload($request);
        }

        $course->update($this->prepareCheckboxes($request, $data));

        flash()->success('تم تحديث الدورة بنجاح');
        return redirect()->route('admin.courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        flash()->success('تم حذف الدورة بنجاح');
        return redirect()->route('admin.courses.index');
    }

    // ===== Helpers =====
    protected function validateCourse(Request $request, $courseId = null)
    {
        return $request->validate([
            'title' => 'required|string|max:190',
            'slug' => 'required|string|max:190|unique:courses,slug,' . ($courseId ?? 'NULL'),
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'original_price' => 'nullable|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'discount_percent' => 'nullable|numeric|min:0|max:100',
            'difficulty_level' => 'required|in:beginner,intermediate,advanced',
            'duration' => 'nullable|string|max:50',
            'lessons_count' => 'nullable|integer|min:0',
            'language' => 'nullable|string|max:50',
            'is_published' => 'required|boolean',
            'main_image' => 'nullable|image|max:2048',
        ]);
    }

    protected function handleImageUpload(Request $request)
    {
        if ($request->hasFile('main_image')) {
            $imageName = time() . '_' . $request->file('main_image')->getClientOriginalName();
            $request->file('main_image')->move(public_path('uploads/courses'), $imageName);
            return $imageName;
        }
        return null;
    }

    protected function prepareCheckboxes(Request $request, array $data)
    {
        foreach (['lifetime_access', 'certificate', 'support', 'downloadable_files'] as $field) {
            $data[$field] = $request->has($field);
        }
        return $data;
    }
}
