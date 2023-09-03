<?php

namespace App\Http\Controllers;

use App\DataTables\ActivityLogDataTable;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\DataTables\ReportDataTable;
use App\DataTables\ReportTrackerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ReportTracker;
use Illuminate\Support\Facades\Auth;
// use Yajra\DataTables\DataTablesServiceProvider;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\EloquentDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        Alert::warning('Failed Login', 'Invalid Username or Password');
        return back();
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'username' => 'required',
            'password' => 'required'
        ]);
        $findUser = User::where('email', $request->email)->orWhere('username', $request->username)->first();
        if (!$findUser) {
            $newUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            Alert::success('Success Register', 'Please login with your registered account');
            return redirect('/login');
        }
        Alert::warning('Failed Register', 'Username or Email already registered');
        return back();
    }
    public function dashboard()
    {
        if (request()->ajax()) {
            // $users = User::query();
            $reports = DB::table('reports')
                ->selectRaw('reports.*, categories.name as category_name, reporters.name , reporters.email, categories.id as category_id')
                ->join('reporters', 'reports.reporter_id', '=', 'reporters.id')
                ->leftJoin('categories', 'reports.category_id', '=', 'categories.id')
                ->get();

            return DataTables::of($reports)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $button =   '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="' . htmlspecialchars(json_encode($item)) . '">Edit Data</button>';
                    return $button;
                })
                ->addColumn('media', function ($item) {
                    return '<a href="' . htmlspecialchars(route('download', ['id' => $item->id])) . '">See Evidence</a>';
                })->rawColumns(['media', 'action'])
                ->make();
        }
        return view('layouts.index');
    }
    public function viewMedia($id)
    {
        $reports = Report::findOrFail($id)->getFirstMedia();
        return $reports;
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function edit(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required',
            'status' => 'required',
            'category' => 'required',
            'comments' => 'required'
        ]);
        $currentReport = Report::where('ticket_id', $request->ticket_id)->first();
        // dd($currentReport);
        $newReportTracker = ReportTracker::create([
            'user_id' => Auth::id(),
            'report_id' => $currentReport->id,
            'status' => $request->status,
            'note' => $request->comments
        ]);
        $category = Category::where('slug', $request->category)->first();
        $currentReport->status = $request->status;
        $currentReport->category_id = $category->id;
        $currentReport->save();
        Alert::success('Success', 'Report edited successfully');
        return view('layouts.index');
    }
    public function reports(ReportTrackerDataTable $datatable)
    {
        return $datatable->render('index');
    }
    public function activity(ActivityLogDataTable $datatable)
    {
        return $datatable->render('index');
    }
}
