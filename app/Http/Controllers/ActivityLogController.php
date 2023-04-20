<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityLogRequest;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = ActivityLog::where('member_id', Auth::user()->member()->first()->member_id)->get();
        return view('activity/index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivityLogRequest $activityLogRequest)
    {
        $activity = Auth::user()->member()->first()->activity()->create($this->activityLog());

        return redirect('/activity/' . $activity->activity_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Activity sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityLog $activity)
    {
        return view('activity/show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ActivityLog $activity)
    {
        return view('activity/edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivityLogRequest $activityLogRequest, ActivityLog $activity)
    {
        $activity->update($this->activityLog());

        return redirect('/activity/' . $activity->activity_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Activity sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityLog $activity)
    {
        $activity->delete();

        return redirect('/activity')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Activity sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
    }

    public function activityLog() {
        return [
            "nama_aktivitas" => request('nama_aktivitas'),
            'class' => request('class'),
            "function" => request('function'),
            "input" => request('input'),
            "output" => request('output'),
        ];
    }
}
