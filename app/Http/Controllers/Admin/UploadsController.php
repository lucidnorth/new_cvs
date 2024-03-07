<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUploadRequest;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Models\Upload;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UploadsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('upload_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Upload::query()->select(sprintf('%s.*', (new Upload)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'upload_show';
                $editGate      = 'upload_edit';
                $deleteGate    = 'upload_delete';
                $crudRoutePart = 'uploads';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('uplaods', function ($row) {
                return $row->uplaods ? '<a href="' . $row->uplaods->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'uplaods']);

            return $table->make(true);
        }

        return view('admin.uploads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('upload_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.uploads.create');
    }

    public function store(StoreUploadRequest $request)
    {
        $upload = Upload::create($request->all());

        if ($request->input('uplaods', false)) {
            $upload->addMedia(storage_path('tmp/uploads/' . basename($request->input('uplaods'))))->toMediaCollection('uplaods');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $upload->id]);
        }

        return redirect()->route('admin.uploads.index');
    }

    public function edit(Upload $upload)
    {
        abort_if(Gate::denies('upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.uploads.edit', compact('upload'));
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

        return redirect()->route('admin.uploads.index');
    }

    public function show(Upload $upload)
    {
        abort_if(Gate::denies('upload_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.uploads.show', compact('upload'));
    }

    public function destroy(Upload $upload)
    {
        abort_if(Gate::denies('upload_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $upload->delete();

        return back();
    }

    public function massDestroy(MassDestroyUploadRequest $request)
    {
        $uploads = Upload::find(request('ids'));

        foreach ($uploads as $upload) {
            $upload->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('upload_create') && Gate::denies('upload_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Upload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
