<?php

namespace Yazdan\Course\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Course\App\Models\Course;
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
        $types = CourseRepository::$types;
        $statuses = CourseRepository::$statuses;
        return view('Course::admin.create',compact('types', 'statuses'));
    }

    public function store(CourseRequest $request)
    {
        $this->authorize('create', Course::class);
        if (isset($request->image)) {
            $images = MediaFileService::publicUpload($request->image);
            $request->request->add(['media_id' => $images->id]);
        }
        CourseRepository::store($request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }
}
