<?php

namespace App\Http\Controllers;

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
        $posts = Receiving::all();
        return view('receiving.index', compact('receiving'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('receiving.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'job' => 'reqired', 
            'workshop_id' => 'reqired',
            'sale' => 'reqired',
        ]);

        Receiving::create($request->all());

        return redirect()->route('receiving.index')->with('success','Receiving created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('receiving.show', compact('receiving'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('receiving.edit',compact('receiving'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receiving $receiving)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'job' => 'reqired', 
            'workshop_id' => 'reqired',
            'sale' => 'reqired',
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
