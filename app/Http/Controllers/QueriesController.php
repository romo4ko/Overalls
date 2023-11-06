<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Receiving;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employers = Employer::all()->sortByDesc('updated_at');

        $datetimes = Receiving::all('updated_at')->sortByDesc('updated_at');
        $years = []; $months = [];
        foreach ($datetimes as $datetime) {
            $year = Carbon::createFromFormat('Y-m-d H:i:s', $datetime->updated_at)->year;
            $month = Carbon::createFromFormat('Y-m-d H:i:s', $datetime->updated_at)->month;
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
            if (!in_array($month, $months)) {
                $months[] = $month;
            }
        }
        
        return view('layout.queries.index', compact('employers', 'years', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workshops = Workshop::all();
        return view('layout.employers.create', compact('workshops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'job' => 'required', 
            'workshop_id' => 'required',
            'sale',
        ]);

        Employer::create($request->all());

        return redirect()->route('layout.employers.index')->with('success','Employer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        return view('layout.employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        $workshops = Workshop::all();
        return view('layout.employers.edit',compact('employer', 'workshops'));
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

        Receiving::where('employer_id', $employer->id)->delete();

        return redirect()
            ->route('employers.index')
            ->with('success','Employer deleted successfully');
    }
}
