<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Http\Resources\Admin\PaperResource;
use App\Models\Paper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PapersApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperResource(Paper::with(['paper_title'])->get());
    }

    public function store(StorePaperRequest $request)
    {
        $paper = Paper::create($request->all());

        if ($request->input('papers', false)) {
            $paper->addMedia(storage_path('tmp/uploads/' . basename($request->input('papers'))))->toMediaCollection('papers');
        }

        if ($request->input('file_upload', false)) {
            $paper->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_upload'))))->toMediaCollection('file_upload');
        }

        return (new PaperResource($paper))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Paper $paper)
    {
        abort_if(Gate::denies('paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaperResource($paper->load(['paper_title']));
    }

    public function update(UpdatePaperRequest $request, Paper $paper)
    {
        $paper->update($request->all());

        if ($request->input('papers', false)) {
            if (! $paper->papers || $request->input('papers') !== $paper->papers->file_name) {
                if ($paper->papers) {
                    $paper->papers->delete();
                }
                $paper->addMedia(storage_path('tmp/uploads/' . basename($request->input('papers'))))->toMediaCollection('papers');
            }
        } elseif ($paper->papers) {
            $paper->papers->delete();
        }

        if ($request->input('file_upload', false)) {
            if (! $paper->file_upload || $request->input('file_upload') !== $paper->file_upload->file_name) {
                if ($paper->file_upload) {
                    $paper->file_upload->delete();
                }
                $paper->addMedia(storage_path('tmp/uploads/' . basename($request->input('file_upload'))))->toMediaCollection('file_upload');
            }
        } elseif ($paper->file_upload) {
            $paper->file_upload->delete();
        }

        return (new PaperResource($paper))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Paper $paper)
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
