<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPaperRequest;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Models\Paper;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PapersController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('paper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Paper::with(['paper_title'])->select(sprintf('%s.*', (new Paper)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'paper_show';
                $editGate      = 'paper_edit';
                $deleteGate    = 'paper_delete';
                $crudRoutePart = 'papers';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('papers', function ($row) {
                return $row->papers ? '<a href="' . $row->papers->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->addColumn('paper_title_name', function ($row) {
                return $row->paper_title ? $row->paper_title->name : '';
            });

            $table->editColumn('file_upload', function ($row) {
                return $row->file_upload ? '<a href="' . $row->file_upload->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'papers', 'paper_title', 'file_upload']);

            return $table->make(true);
        }

        $allpapers = Paper::orderBy('created_at', 'desc')->take(20)->get();

        return view('admin.papers.index', ['allpapers' => $allpapers]);
    }

    public function create()
    {
        abort_if(Gate::denies('paper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_titles = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.papers.create', compact('paper_titles'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $paper->id]);
        }

        return redirect()->route('admin.papers.index');
    }

    public function edit(Paper $paper)
    {
        abort_if(Gate::denies('paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper_titles = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paper->load('paper_title');

        return view('admin.papers.edit', compact('paper', 'paper_titles'));
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

        return redirect()->route('admin.papers.index');
    }

    public function show(Paper $paper)
    {
        abort_if(Gate::denies('paper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->load('paper_title');

        return view('admin.papers.show', compact('paper'));
    }

    public function destroy(Paper $paper)
    {
        abort_if(Gate::denies('paper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paper->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaperRequest $request)
    {
        $papers = Paper::find(request('ids'));

        foreach ($papers as $paper) {
            $paper->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('paper_create') && Gate::denies('paper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Paper();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
