<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Overalls;
use App\Models\Receiving;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receiving = Receiving::all()->sortByDesc('updated_at');
        return view('layout.receiving.index', compact('receiving'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employers = Employer::all();
        $overalls = Overalls::all();
        return view('layout.receiving.create', compact('employers', 'overalls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employer_id' => 'required',
            'overall_id' => 'required',
        ]);

        Receiving::create($request->all());

        return redirect()->route('layout.receiving.index')->with('success','Receiving created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Receiving $receiving)
    {
        return view('layout.receiving.show', compact('receiving'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receiving $receiving)
    {
        $employers = Employer::all();
        $overalls = Overalls::all();
        return view('layout.receiving.edit',compact('receiving', 'employers', 'overalls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receiving $receiving)
    {
        $request->validate([
            'employer_id' => 'required',
            'overall_id' => 'required',
        ]);

        $receiving->update($request->all());

        return redirect()->route('receiving.index')->with('success','Receiving updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receiving $receiving)
    {
        $receiving->delete();

        return redirect()
            ->route('receiving.index')
            ->with('success','Receiving deleted successfully');
    }
}
