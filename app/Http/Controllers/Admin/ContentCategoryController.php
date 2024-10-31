<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContentCategoryRequest;
use App\Http\Requests\StoreContentCategoryRequest;
use App\Http\Requests\UpdateContentCategoryRequest;
use App\Models\ContentCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('content_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentCategories = ContentCategory::all();

        return view('admin.contentCategories.index', compact('contentCategories'));
    }


    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('news.index')->with('status', 'News created successfully!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $news->update($request->only(['title', 'content', 'published_at']));

        return redirect()->route('news.index')->with('status', 'News updated successfully!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('status', 'News deleted successfully!');
    }

    // public function create()
    // {
    //     abort_if(Gate::denies('content_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.contentCategories.create');
    // }

    // public function store(StoreContentCategoryRequest $request)
    // {
    //     $contentCategory = ContentCategory::create($request->all());

    //     return redirect()->route('admin.content-categories.index');
    // }

    // public function edit(ContentCategory $contentCategory)
    // {
    //     abort_if(Gate::denies('content_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.contentCategories.edit', compact('contentCategory'));
    // }

    // public function update(UpdateContentCategoryRequest $request, ContentCategory $contentCategory)
    // {
    //     $contentCategory->update($request->all());

    //     return redirect()->route('admin.content-categories.index');
    // }

    // public function show(ContentCategory $contentCategory)
    // {
    //     abort_if(Gate::denies('content_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     return view('admin.contentCategories.show', compact('contentCategory'));
    // }

    // public function destroy(ContentCategory $contentCategory)
    // {
    //     abort_if(Gate::denies('content_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $contentCategory->delete();

    //     return back();
    // }

    // public function massDestroy(MassDestroyContentCategoryRequest $request)
    // {
    //     $contentCategories = ContentCategory::find(request('ids'));

    //     foreach ($contentCategories as $contentCategory) {
    //         $contentCategory->delete();
    //     }

    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
