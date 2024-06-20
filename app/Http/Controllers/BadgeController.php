<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBadgeRequest;
use App\Http\Requests\UpdateBadgeRequest;
use App\Models\Badge;
use App\Models\Course;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['courses'] = Course::all();
        $data['teachers'] = User::where("role", 2)->get();
        $data['badges'] = Badge::latest()->get();
        return view("pages.admin.students.badges_all")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("pages.admin.students.badge_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBadgeRequest $request)
    {
        // dd($request->all());
        Badge::create($request->all());

        Alert::success("Badge Created Successfully ","Now add the students in their respective badges");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Badge $badge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBadgeRequest $request, Badge $badge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Badge $badge)
    {
        //
    }
}