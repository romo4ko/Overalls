<?php

namespace App\Http\Controllers;

use App\Models\Overalls;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OverallsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Overalls::all();
        return view('overalls.index', compact('overalls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('overalls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'term' => 'required',
            'cost' => 'required', 
        ]);

        Overalls::create($request->all());

        return redirect()->route('overalls.index')->with('success','Overalls created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('overalls.show', compact('overalls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('overalls.edit',compact('overalls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Overalls $overalls)
    {
        $request->validate([
            'type' => 'required',
            'term' => 'required',
            'cost' => 'reqired', 
        ]);

        $overalls->update($request->all());

        return redirect()->route('overalls.index')->with('success','Overalls updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overalls $overalls)
    {
        $overalls->delete();

        return redirect()
            ->route('overalls.index')
            ->with('success','Overalls deleted successfully');
    }
}
