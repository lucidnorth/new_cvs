<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyContentPageRequest;
use App\Http\Requests\StoreContentPageRequest;
use App\Http\Requests\UpdateContentPageRequest;
use App\Models\ContentCategory;
use App\Models\ContentPage;
use App\Models\ContentTag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ContentPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('content_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentPages = ContentPage::with(['categories:id,name', 'tags:id,name', 'media'])->get(['id', 'title', 'created_at']);

        return view('admin.contentPages.index', compact('contentPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('content_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::pluck('name', 'id');
        $tags = ContentTag::pluck('name', 'id');

        return view('admin.contentPages.create', compact('categories', 'tags'));
    }

    // public function store(StoreContentPageRequest $request)
    // {
    //     $contentPage = ContentPage::create($request->all());
    //     $contentPage->categories()->sync($request->input('categories', []));
    //     $contentPage->tags()->sync($request->input('tags', []));

    //     if ($request->input('featured_image', false)) {
    //         $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
    //     }

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $contentPage->id]);
    //     }

    //     return redirect()->route('admin.content-pages.index')->with('success', 'Content page created successfully!');
    // }

    public function store(StoreContentPageRequest $request)
{
    $contentPage = ContentPage::create($request->all());
    $contentPage->categories()->sync($request->input('categories', []));
    $contentPage->tags()->sync($request->input('tags', []));

    if ($request->input('featured_image', false)) {
        $contentPage->addMedia(storage_path('app/public/tmp/uploads/' . $request->input('featured_image')))
                    ->toMediaCollection('featured_image');
    }

    return redirect()->route('admin.content-pages.index')->with('success', 'Content page created successfully!');
}



    public function edit(ContentPage $contentPage)
    {
        abort_if(Gate::denies('content_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ContentCategory::pluck('name', 'id');
        $tags = ContentTag::pluck('name', 'id');

        $contentPage->load('categories', 'tags');

        return view('admin.contentPages.edit', compact('categories', 'contentPage', 'tags'));
    }

    public function update(UpdateContentPageRequest $request, ContentPage $contentPage)
    {
        $contentPage->update($request->all());
        $contentPage->categories()->sync($request->input('categories', []));
        $contentPage->tags()->sync($request->input('tags', []));

        if ($request->input('featured_image', false)) {
            if (!$contentPage->featured_image || $request->input('featured_image') !== $contentPage->featured_image->file_name) {
                if ($contentPage->featured_image) {
                    $contentPage->featured_image->delete();
                }
                $contentPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($contentPage->featured_image) {
            $contentPage->featured_image->delete();
        }

        return redirect()->route('admin.content-pages.index')->with('success', 'Content page updated successfully!');
    }

    // public function update(UpdateContentPageRequest $request, ContentPage $contentPage)
    // {
    //     $contentPage->update($request->all());
    //     $contentPage->categories()->sync($request->input('categories', []));
    //     $contentPage->tags()->sync($request->input('tags', []));

    //     if ($request->input('featured_image', false)) {
    //         if (!$contentPage->getFirstMedia('featured_image') || $request->input('featured_image') !== $contentPage->getFirstMedia('featured_image')->file_name) {
    //             if ($contentPage->getFirstMedia('featured_image')) {
    //                 $contentPage->getFirstMedia('featured_image')->delete();
    //             }
    //             $contentPage->addMedia(storage_path('app/public/tmp/uploads/' . $request->input('featured_image')))
    //                         ->toMediaCollection('featured_image');
    //         }
    //     } elseif ($contentPage->getFirstMedia('featured_image')) {
    //         $contentPage->getFirstMedia('featured_image')->delete();
    //     }

    //     return redirect()->route('admin.content-pages.index')->with('success', 'Content page updated successfully!');
    // }



    public function show(ContentPage $contentPage)
    {
        abort_if(Gate::denies('content_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentPage->load('categories', 'tags');

        return view('admin.contentPages.show', compact('contentPage'));
    }

    public function destroy(ContentPage $contentPage)
    {
        abort_if(Gate::denies('content_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentPage->delete();

        return back()->with('success', 'Content page deleted successfully!');
    }

    public function massDestroy(MassDestroyContentPageRequest $request)
    {
        ContentPage::destroy($request->input('ids', []));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function restore($id)
    {
        $contentPage = ContentPage::onlyTrashed()->findOrFail($id);
        $contentPage->restore();

        return redirect()->route('admin.content-pages.index')->with('success', 'Content page restored successfully!');
    }

    // public function storeCKEditorImages(Request $request)
    // {
    //     abort_if(Gate::denies('content_page_create') && Gate::denies('content_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    //     $model = new ContentPage();
    //     $model->id = $request->input('crud_id', 0);
    //     $model->exists = true;
    //     $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

    //     return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    // }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(
            Gate::denies('content_page_create') && Gate::denies('content_page_edit'), 
            Response::HTTP_FORBIDDEN, 
            '403 Forbidden'
        );

        // Validate the uploaded file
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Create a temporary ContentPage instance
        $model = new ContentPage();
        $model->id = $request->input('crud_id', 0); // Use provided `crud_id`, if any
        $model->exists = true; // Mark the model as existing to allow media attachment

        // Store the uploaded file in the `ck-media` collection
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        // Return JSON response with the uploaded file's URL
        return response()->json([
            'id' => $media->id,
            'url' => $media->getUrl(),
        ], Response::HTTP_CREATED);
    }



}
