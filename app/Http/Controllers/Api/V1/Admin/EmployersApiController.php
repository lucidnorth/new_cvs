<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Http\Resources\Admin\EmployerResource;
use App\Models\Employer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('employer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployerResource(Employer::with(['created_by'])->get());
    }

    public function store(StoreEmployerRequest $request)
    {
        $employer = Employer::create($request->all());

        return (new EmployerResource($employer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employer $employer)
    {
        abort_if(Gate::denies('employer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployerResource($employer->load(['created_by']));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->update($request->all());

        return (new EmployerResource($employer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employer $employer)
    {
        abort_if(Gate::denies('employer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
