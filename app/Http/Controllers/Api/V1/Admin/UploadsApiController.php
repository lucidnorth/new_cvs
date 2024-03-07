<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Http\Resources\Admin\UploadResource;
use App\Models\Upload;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UploadsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UploadResource(Upload::all());
    }

    public function store(StoreUploadRequest $request)
    {
        $upload = Upload::create($request->all());

        if ($request->input('uplaods', false)) {
            $upload->addMedia(storage_path('tmp/uploads/' . basename($request->input('uplaods'))))->toMediaCollection('uplaods');
        }

        return (new UploadResource($upload))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Upload $upload)
    {
        abort_if(Gate::denies('upload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UploadResource($upload);
    }

    public function update(UpdateUploadRequest $request, Upload $upload)
    {
        $upload->update($request->all());

        if ($request->input('uplaods', false)) {
            if (! $upload->uplaods || $request->input('uplaods') !== $upload->uplaods->file_name) {
                if ($upload->uplaods) {
                    $upload->uplaods->delete();
                }
                $upload->addMedia(storage_path('tmp/uploads/' . basename($request->input('uplaods'))))->toMediaCollection('uplaods');
            }
        } elseif ($upload->uplaods) {
            $upload->uplaods->delete();
        }

        return (new UploadResource($upload))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Upload $upload)
    {
        abort_if(Gate::denies('upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
