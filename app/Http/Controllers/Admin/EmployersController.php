<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyEmployerRequest;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Employer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EmployersController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('employer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Employer::with(['created_by'])->select(sprintf('%s.*', (new Employer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'employer_show';
                $editGate      = 'employer_edit';
                $deleteGate    = 'employer_delete';
                $crudRoutePart = 'employers';

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
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.employers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('employer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.employers.create');
    }

    public function store(StoreEmployerRequest $request)
    {
        $employer = Employer::create($request->all());

        return redirect()->route('admin.employers.index');
    }

    public function edit(Employer $employer)
    {
        abort_if(Gate::denies('employer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->load('created_by');

        return view('admin.employers.edit', compact('employer'));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->update($request->all());

        return redirect()->route('admin.employers.index');
    }

    public function show(Employer $employer)
    {
        abort_if(Gate::denies('employer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->load('created_by');

        return view('admin.employers.show', compact('employer'));
    }

    public function destroy(Employer $employer)
    {
        abort_if(Gate::denies('employer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployerRequest $request)
    {
        $employers = Employer::find(request('ids'));

        foreach ($employers as $employer) {
            $employer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
