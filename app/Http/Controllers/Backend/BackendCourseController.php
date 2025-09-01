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
        $this->middleware('can:courses-update', ['only' => ['edit', 'update', 'resolve']]);
        $this->middleware('can:courses-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $courses = Course::where(function ($q) use ($request) {
            if ($request->id != null) {
                $q->where('id', $request->id);
            }
            if ($request->q != null) {
                $q->where('title', 'LIKE', '%' . $request->q . '%')->orWhere('description', 'LIKE', '%' . $request->q . '%');
            }
        })->orderBy('id', 'DESC')->paginate();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::orderBy('id', 'DESC')->get();
        return view('admin.courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course $course, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        flash()->success(__('utils/toastr.article_destroy_success_message'));
        return redirect()->route('admin.courses.index');
    }
}
