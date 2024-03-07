<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTractionRequest;
use App\Http\Requests\StoreTractionRequest;
use App\Http\Requests\UpdateTractionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TractionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('traction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tractions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('traction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tractions.create');
    }

    public function store(StoreTractionRequest $request)
    {
        $traction = Traction::create($request->all());

        return redirect()->route('admin.tractions.index');
    }

    public function edit(Traction $traction)
    {
        abort_if(Gate::denies('traction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tractions.edit', compact('traction'));
    }

    public function update(UpdateTractionRequest $request, Traction $traction)
    {
        $traction->update($request->all());

        return redirect()->route('admin.tractions.index');
    }

    public function show(Traction $traction)
    {
        abort_if(Gate::denies('traction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tractions.show', compact('traction'));
    }

    public function destroy(Traction $traction)
    {
        abort_if(Gate::denies('traction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $traction->delete();

        return back();
    }

    public function massDestroy(MassDestroyTractionRequest $request)
    {
        $tractions = Traction::find(request('ids'));

        foreach ($tractions as $traction) {
            $traction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
