<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInstitutionRequest;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Models\Institution;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel; // Import Excel facade
use App\Imports\CertificatesImport; // Your custom Excel import class
use App\Imports\InstitutionImport;

class InstitutionsController extends Controller
{
    use MediaUploadingTrait;

    // Method for displaying the institutions index page
    public function index(Request $request)
    {
        abort_if(Gate::denies('institution_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Institution::with(['created_by'])->select(sprintf('%s.*', (new Institution)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'institution_show';
                $editGate      = 'institution_edit';
                $deleteGate    = 'institution_delete';
                $crudRoutePart = 'institutions';

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

            $table->editColumn('institutions', function ($row) {
                return $row->institutions ? $row->institutions : '';
            });
            
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo']);

            return $table->make(true);
        }

        return view('admin.institutions.index');
    }

    // Method for parsing Excel import
    public function parseExcelImport(Request $request)
    {
        abort_if(Gate::denies('institution_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Validate the Excel file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        // Use the Excel import class to parse the data
        Excel::import(new InstitutionImport, $request->file('excel_file'));

        return redirect()->route('admin.institutions.index')->with('success', 'Institutions imported successfully!');
    }

    // Method for processing Excel import
    public function processExcelImport(Request $request)
    {
        // This can be for additional processing after import if needed
        // Add custom handling logic here if needed
        return redirect()->route('admin.institutions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('institution_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.institutions.create');
    }

    public function store(StoreInstitutionRequest $request)
    {
        $institution = Institution::create($request->all());

        if ($request->input('logo', false)) {
            $institution->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $institution->id]);
        }

        return redirect()->route('admin.institutions.index');
    }

    public function edit(Institution $institution)
    {
        abort_if(Gate::denies('institution_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institution->load('created_by');

        return view('admin.institutions.edit', compact('institution'));
    }

    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->all());

        if ($request->input('logo', false)) {
            if (! $institution->logo || $request->input('logo') !== $institution->logo->file_name) {
                if ($institution->logo) {
                    $institution->logo->delete();
                }
                $institution->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($institution->logo) {
            $institution->logo->delete();
        }

        return redirect()->route('admin.institutions.index');
    }

    public function show(Institution $institution)
    {
        abort_if(Gate::denies('institution_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institution->load('created_by', 'institutionCertificates');
        session()->put('institution_id', $institution->id); 
        return view('admin.institutions.show', compact('institution'));
    }

    public function destroy(Institution $institution)
    {
        abort_if(Gate::denies('institution_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institution->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstitutionRequest $request)
    {
        $institutions = Institution::find(request('ids'));

        foreach ($institutions as $institution) {
            $institution->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('institution_create') && Gate::denies('institution_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Institution();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
