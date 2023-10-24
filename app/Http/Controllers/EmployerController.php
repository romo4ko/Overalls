<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Employer::all();
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employers.create');
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

        Employer::create($request->all());

        return redirect()->route('employers.index')->with('success','Employer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('employers.edit',compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'job' => 'required', 
            'workshop_id' => 'required',
            'sale' => 'required',
        ]);

        $employer->update($request->all());

        return redirect()->route('employers.index')->with('success','Employer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return redirect()
            ->route('employer.index')
            ->with('success','Employer deleted successfully');
    }
}
