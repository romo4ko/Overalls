<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workshops = Workshop::all()->sortByDesc('updated_at');
        return view('layout.workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Workshop::create($request->all());

        return redirect()->route('layout.workshops.index')->with('success','Workshop created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {
        return view('layout.workshops.show', compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        return view('layout.workshops.edit',compact('workshop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $workshop->update($request->all());

        return redirect()->route('workshops.index')->with('success','Workshops updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();

        Employer::where('workshop_id', $workshop->id)->delete();

        return redirect()
            ->route('workshops.index')
            ->with('success','Workshop deleted successfully');
    }
}
