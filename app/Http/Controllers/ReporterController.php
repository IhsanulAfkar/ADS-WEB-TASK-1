<?php

namespace App\Http\Controllers;

use App\DataTables\ReportDataTable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Report;
use App\Models\Reporter;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use RealRashid\SweetAlert\Facades\Alert;

class ReporterController extends Controller
{
    public function index(): View
    {
        return view('form');
    }
    public function submit(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric'],
            'identity_type' => ['required', 'string'],
            'identity_no' => ['required', 'numeric'],
            'birth_place' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'evidence' => ['required', File::types(['pdf', 'jpg', 'jpeg', 'png', 'mp4'])->max(12 * 1024)],
        ]);
        $newReporter = Reporter::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'identity_type' => $request->identity_type,
            'identity_number' => $request->identity_no,
            'pob' => $request->birth_place,
            'dob' => $request->birth_date,
            'address' => $request->address,
        ]);
        $date = date_format(date_create(), "Ymd");
        $lastReportSinceToday = Report::where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())->count();
        $newReport = Report::create([
            'reporter_id' => $newReporter->id,
            'ticket_id' => $date . ($lastReportSinceToday ? $lastReportSinceToday : '1'),
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $newReport->addMediaFromRequest('evidence')->toMediaCollection();
        Alert::success('Success', 'Submitted successfully!');
        return view('form');
    }

    public function reports(ReportDataTable $datatable)
    {
        return $datatable->render('index');
    }
}
