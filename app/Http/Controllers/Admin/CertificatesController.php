<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCertificateRequest;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CertificatesImport;

class CertificatesController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('certificate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institutions = Institution::pluck('institutions', 'id');
        if ($request->ajax()) {
            $query = Certificate::with(['institution', 'created_by'])->select(sprintf('%s.*', (new Certificate)->table));
            $table = Datatables::of($query);

            $table->addColumn('institution_id', function ($row) {
                return $row->institution ? $row->institution->id : '';
            });

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'certificate_show';
                $editGate = 'certificate_edit';
                $deleteGate = 'certificate_delete';
                $crudRoutePart = 'certificates';

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

            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });

            $table->editColumn('middle_name', function ($row) {
                return $row->middle_name ? $row->middle_name : '';
            });

            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });

            $table->editColumn('gender', function ($row) {
                $gender = strtolower($row['gender']);
                return isset(Certificate::GENDER_SELECT[$gender]) ? Certificate::GENDER_SELECT[$gender] : 'Unknown';
            });

            $table->addColumn('institution_institutions', function ($row) {
                return $row->institution ? $row->institution->institutions : '';
            });

            $table->editColumn('certificate_number', function ($row) {
                return $row->certificate_number ? $row->certificate_number : '';
            });

            $table->editColumn('student_identification', function ($row) {
                return $row->student_identification ? $row->student_identification : '';
            });

            $table->editColumn('qualification_type', function ($row) {
                return $row->qualification_type ? $row->qualification_type : '';
            });

            $table->editColumn('programme', function ($row) {
                return $row->programme ? $row->programme : '';
            });

            $table->editColumn('class', function ($row) {
                return $row->class ? $row->class : '';
            });

            $table->editColumn('year_of_entry', function ($row) {
                return $row->year_of_entry ? $row->year_of_entry : '';
            });
            
            $table->editColumn('year_of_completion', function ($row) {
                return $row->year_of_completion ? $row->year_of_completion : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo', 'institution']);

            return $table->make(true);
        }

        $users = User::get();
        $uploads = Upload::all();

        return view('admin.certificates.index', compact('institutions', 'users', 'uploads'));
    }

    public function create()
    {
        abort_if(Gate::denies('certificate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institutions = Institution::pluck('institutions', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.certificates.create', compact('institutions'));
    }

    public function store(StoreCertificateRequest $request)
    {
        $request->validate([
            'institution_id' => 'required|exists:institutions,id',
        ]);

        $certificate = Certificate::create($request->all());

        if ($request->input('photo', false)) {
            $certificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $certificate->id]);
        }

        return redirect()->route('admin.certificates.index');
    }

    public function edit(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institutions = Institution::pluck('institutions', 'id')->prepend(trans('global.pleaseSelect'), '');
        $certificate->load('institution', 'created_by');

        return view('admin.certificates.edit', compact('certificate', 'institutions'));
    }

    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $certificate->update($request->all());

        if ($request->input('photo', false)) {
            if (!$certificate->photo || $request->input('photo') !== $certificate->photo->file_name) {
                if ($certificate->photo) {
                    $certificate->photo->delete();
                }
                $certificate->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($certificate->photo) {
            $certificate->photo->delete();
        }

        return redirect()->route('admin.certificates.index');
    }

    public function show(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->load('institution', 'created_by');

        return view('admin.certificates.show', compact('certificate'));
    }

    public function destroy(Certificate $certificate)
    {
        abort_if(Gate::denies('certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificate->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificateRequest $request)
    {
        $certificates = Certificate::find(request('ids'));

        foreach ($certificates as $certificate) {
            $certificate->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('certificate_create') && Gate::denies('certificate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Certificate();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    // New Method to Handle Excel Import
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
            'institution_id' => 'required|integer',
        ]);

        Excel::import(new CertificatesImport($request->institution_id), $request->file('file'));

        return redirect()->back()->with('success', 'Certificates imported successfully!');
    }
}
