<?php

namespace Yazdan\Course\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Course\App\Models\Course;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Course\Repositories\CourseRepository;
use Yazdan\Comment\Repositories\CommentRepository;
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
        return view('Course::admin.create', compact('statuses'));
    }

    public function store(CourseRequest $request)
    {
        $this->authorize('manage', Course::class);
        $request = storeImage($request);
        $request = storeVideo($request);
        CourseRepository::store($request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }

    public function destroy(Course $course)
    {
        $this->authorize('manage', Course::class);
        destroyImage($course);
        destroyVideo($course);
        $course->delete();
        return AjaxResponses::SuccessResponses();
    }

    public function edit(Course $course)
    {
        $this->authorize('manage', Course::class);
        $statuses = CourseRepository::$statuses;
        return view('Course::admin.edit', compact('course', 'statuses'));
    }

    public function update(CourseRequest $request, $id)
    {
        $this->authorize('manage', Course::class);
        $course = CourseRepository::findById($id);
        $request = updateImage($request, $course);
        $request = updateVideo($request, $course);
        CourseRepository::updating($course->id, $request);
        newFeedbacks();
        return redirect(route('admin.courses.index'));
    }

    //front

    public function courses()
    {
        $courses = Course::latest()->paginate(1);
        return view('Course::front.index', compact('courses'));
    }

    public function courseShow(Course $course, Request $request)
    {
        $cookie = checkView($course, $request);
        $comments = $course->comments()->where('comment_id', null)->where('status', CommentRepository::STATUS_APPROVED)->latest()->paginate(10);
        if ($cookie == false) {
            return view('Course::front.show', compact('course', 'comments'));
        } else {
            return response()->view('Course::front.show', compact('course', 'comments'))->withCookie($cookie);
        }
    }
}
