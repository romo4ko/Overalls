<?php

namespace App\Http\Controllers;

use App\Models\Overalls;
use App\Models\Receiving;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OverallsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $overalls = Overalls::all()->sortByDesc('updated_at');
        return view('layout.overalls.index', compact('overalls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layout.overalls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|max:50',
            'term' => 'required|max:100',
            'cost' => 'required|max:10',
        ]);

        Overalls::create($request->all());

        return redirect()->route('overalls.index')->with('success','Overall created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Overalls $overall)
    {
        return view('layout.overalls.show', compact('overall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Overalls $overall)
    {
        return view('layout.overalls.edit',compact('overall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Overalls $overall)
    {
        $request->validate([
            'type' => 'required|max:50',
            'term' => 'required|max:100',
            'cost' => 'required|max:10',
        ]);

        $overall->update($request->all());

        return redirect()->route('overalls.index')->with('success','Overalls updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overalls $overall)
    {
        $overall->delete();
        
        Receiving::where('overall_id', $overall->id)->delete();

        return redirect()
            ->route('overalls.index')
            ->with('success','Overall deleted successfully');
    }
}
