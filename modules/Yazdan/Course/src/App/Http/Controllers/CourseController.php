<?php

namespace Yazdan\Course\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Course\App\Models\Course;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Course\App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        $this->authorize('manage', Course::class);

        $courses = CourseRepository::getAllPaginate(10);
        return view('Course::admin.index', compact('courses'));
    }
    public function create()
    {
        $this->authorize('manage', Course::class);
        $statuses = CourseRepository::$statuses;
        return view('Course::admin.create',compact('statuses'));
    }

    public function store(CourseRequest $request)
    {
        $this->authorize('manage', Course::class);
        $request = storeImage($request);
        CourseRepository::store($request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }

    public function destroy(Course $course)
    {
        $this->authorize('manage', Course::class);
        destroyImage($course);
    }

    public function edit(Course $course)
    {
        $this->authorize('manage', Course::class);
        $statuses = CourseRepository::$statuses;
        return view('Course::admin.edit', compact('course','statuses'));
    }

    public function update(CourseRequest $request,$id)
    {
        $this->authorize('manage', Course::class);
        $course = CourseRepository::findById($id);
        $request = updateImage($request,$course);
        CourseRepository::updating($course->id,$request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }
}