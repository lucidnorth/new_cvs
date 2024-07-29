<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComplaintRequest;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TalktoUs;
use Illuminate\Support\Facades\Mail;
class ComplaintsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('complaint_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talkToUsEntries = TalkToUs::all(); // Fetch all entries from the database

        return view('admin.complaints.index', compact('talkToUsEntries'));
    }

    // Handle the reply email sending
    public function sendReply(Request $request)
    {
        $request->validate([
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::raw($request->message, function ($message) use ($request) {
                $message->to($request->recipient)
                        ->subject($request->subject)
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });

            return redirect()->back()->with('success', 'Reply sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send reply. Please try again.');
        }
    }

    public function create()
    {
        abort_if(Gate::denies('complaint_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.create');
    }

    public function store(StoreComplaintRequest $request)
    {
        $complaint = Complaint::create($request->all());

        return redirect()->route('admin.complaints.index');
    }

    public function edit(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.edit', compact('complaint'));
    }

    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update($request->all());

        return redirect()->route('admin.complaints.index');
    }

    public function show(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.complaints.show', compact('complaint'));
    }

    public function destroy(Complaint $complaint)
    {
        abort_if(Gate::denies('complaint_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $complaint->delete();

        return back();
    }

    public function massDestroy(MassDestroyComplaintRequest $request)
    {
        $complaints = Complaint::find(request('ids'));

        foreach ($complaints as $complaint) {
            $complaint->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
