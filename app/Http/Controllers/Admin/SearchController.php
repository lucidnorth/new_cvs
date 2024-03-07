<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySearchRequest;
use App\Http\Requests\StoreSearchRequest;
use App\Http\Requests\UpdateSearchRequest;
use Gate;
use App\Models\Institution;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('search_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $institutions = Institution::all();

        

        return view('admin.searches.index',[ 'institution'=> $institutions]); 
    }

// SearchController.php
public function search(Request $request)
{
    $this->validate($request, [
        'institution_id' => 'required|exists:institutions,id',
        'certificate_number' => 'required|string',
    ]);

    $institutionId = $request->input('institution_id');
    $certificateNumber = $request->input('certificate_number');

    $certificate = Certificate::where('institution_id', $institutionId)
        ->where('certificate_number', $certificateNumber)
        ->with('institution') // Assuming 'student' is the relationship name in the Certificate model
        ->first();

    if ($certificate) {
        return redirect()->route('search.index')->with('certificate', $certificate);
    }

    return redirect()->route('search.index')->with('error', 'No matching record found.');
}

// private function getPreviousSearches($institutionId, $certificateNumber, $limit)
// {
//     $previousSearches = Certificate::where('institution_id', '!=', $request->institution_id)
//     ->orWhere('certificate_number', '!=', $request->certificate_number)
//     ->limit(5) // Adjust the limit as needed
//     ->get();

//     return;
// }


    public function create()
    {
        abort_if(Gate::denies('search_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.searches.create');
    }

    public function store(StoreSearchRequest $request)
    {
        $search = Search::create($request->all());

        return redirect()->route('admin.searches.index');
    }

    public function edit(Search $search)
    {
        abort_if(Gate::denies('search_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.searches.edit', compact('search'));
    }

    public function update(UpdateSearchRequest $request, Search $search)
    {
        $search->update($request->all());

        return redirect()->route('admin.searches.index');
    }

    public function show(Search $search)
    {
        abort_if(Gate::denies('search_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.searches.show', compact('search'));
    }

    public function destroy(Search $search)
    {
        abort_if(Gate::denies('search_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $search->delete();

        return back();
    }

    public function massDestroy(MassDestroySearchRequest $request)
    {
        $searches = Search::find(request('ids'));

        foreach ($searches as $search) {
            $search->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
