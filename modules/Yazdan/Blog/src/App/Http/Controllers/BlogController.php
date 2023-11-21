<?php

namespace Yazdan\Blog\App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yazdan\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\Blog\Repositories\BlogRepository;
use Yazdan\Blog\App\Http\Requests\BlogRequest;
use Yazdan\Comment\Repositories\CommentRepository;
use Yazdan\Category\Repositories\CategoryRepository;

class BlogController extends Controller
{

    public function index()
    {
        $this->authorize('manage', Blog::class);

        $blogs = BlogRepository::getAllPaginate(10);
        return view('Blog::admin.index', compact('blogs'));
    }

    public function create()
    {
        $this->authorize('manage', Blog::class);
        $categories = CategoryRepository::getTypeAll(Blog::class);
        return view('Blog::admin.create', compact('categories'));
    }

    public function store(BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);
        $request = storeImage($request);
        BlogRepository::create($request);
        newFeedbacks();
        return redirect(route('admin.blogs.index'));
    }

    public function edit($id)
    {
        $this->authorize('manage', Blog::class);

        $blog = BlogRepository::findById($id);
        $categories = CategoryRepository::getAll();
        return view('Blog::admin.edit', compact('blog', 'categories'));
    }

    public function update($id, BlogRequest $request)
    {
        $this->authorize('manage', Blog::class);
        $blog = BlogRepository::findById($id);
        $request = updateImage($request, $blog);
        BlogRepository::updating($id, $request);
        newFeedbacks();
        return redirect(route('admin.blogs.index'));
    }

    public function destroy($id)
    {
        $this->authorize('manage', Blog::class);
        BlogRepository::delete($id);
        return AjaxResponses::SuccessResponses();
    }

    //front

    public function blogs()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('Blog::front.index', compact('blogs'));
    }

    public function blogShow(Blog $blog, Request $request)
    {
        $latestPosts = Blog::orderBy('updated_at', 'DESC')->take(5)->get();
        $relatedPosts = Blog::where('category_id', $blog->category->id)->orderBy('updated_at', 'DESC')->take(2)->get();

        $cookie = checkView($blog, $request);
        $comments = $blog->comments()->where('comment_id', null)->where('status', CommentRepository::STATUS_APPROVED)->latest()->paginate(10);
        if ($cookie == false) {
            return view('Blog::front.show', compact('blog', 'latestPosts', 'relatedPosts', 'comments'));
        } else {
            return response()->view('Blog::front.show', compact('blog', 'latestPosts', 'relatedPosts', 'comments'))->withCookie($cookie);
        }
    }
}
