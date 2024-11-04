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

    
  
}
