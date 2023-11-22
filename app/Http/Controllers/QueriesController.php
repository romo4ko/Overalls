<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Receiving;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class QueriesController extends Controller
{
    public function index(Request $request)
    {
        $employers = Employer::all()->sortBy('firstname');

        $datetimes = Receiving::all('created_at')->sortBy('created_at');
        $years = []; $months = []; $quarters = [];
        foreach ($datetimes as $datetime) {
            $year = Carbon::createFromFormat('Y-m-d H:i:s', $datetime->created_at)->year;
            $month = Carbon::createFromFormat('Y-m-d H:i:s', $datetime->created_at)->month;
            $quarter = Carbon::createFromFormat('Y-m-d H:i:s', $datetime->created_at)->quarter;
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
            if (!in_array($month, $months)) {
                $months[] = $month;
            }
            if (!in_array($quarter, $quarters)) {
                $quarters[] = $quarter;
            }
        }
        
        return view('layout.queries.index', compact('employers', 'years', 'months', 'quarters'));
    }

    public function exec(Request $request, string $q)
    {
        switch ($q) {
            case '1':
                $result = $this->query1($request);
                break;
            case '2':
                $result = $this->query2($request);
                break;
            case '3':
                $result = $this->query3();
                break;
            case '4':
                $result = $this->query4($request);
                break;
            case '5':
                $result = $this->query5($request);
                break;
            default:
                break;
        }
        $params = $result[1];
        $result = $result[0];

        return view('layout.queries.result', compact('result', 'q', 'params'));
    }

    public function query1(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
    
        return [
            Employer::whereBetween('sale', [$from, $to])->get(), 
            [
                'from' => $from, 
                'to' => $to
            ]
        ];
    }

    public function query2(Request $request)
    {
        $employer_id = $request->employer_id;
        $employer = Employer::find($employer_id);

        return [
            Employer::join('receiving', 'employers.id', '=', 'receiving.employer_id')
                ->join('overalls', 'overalls.id', '=', 'receiving.overall_id')
                ->where('employers.id','=', $employer_id)
                ->select('employers.*', 'overalls.type', 'receiving.created_at')
                ->get(), 
            ['employer' => $employer]
        ];
    }

    public function query3()
    {
        return [
            DB::table('employers')
                ->select(DB::raw('count(overalls.type) as overall_count, employers.firstname, employers.lastname'))
                ->join('receiving', 'employers.id', '=', 'receiving.employer_id')
                ->join('overalls', 'overalls.id', '=', 'receiving.overall_id')
                ->groupBy('employers.firstname', 'employers.lastname')
                ->get(), 
            []
        ];
    }

    public function query4(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        
        return [
            Employer::join('receiving', 'employers.id', '=', 'receiving.employer_id')
                ->join('overalls', 'overalls.id', '=', 'receiving.overall_id')
                ->whereYear('receiving.created_at', '=', $year)
                ->whereMonth('receiving.created_at', '=', $month)
                ->select('employers.*')
                ->get(), 
            [
                'month' => $month, 
                'year' => $year
            ]
        ];
    }

    public function query5(Request $request)
    {
        $quarter = $request->quarter;
        
        return [
            DB::table('receiving')
                ->select(DB::raw('count(*) as receivings_count'))
                ->where(DB::raw('QUARTER(receiving.created_at)'),'=', $quarter)
                ->whereYear('receiving.created_at','=', date('Y'))
                ->get(), 
            [
                'quarter' => $quarter
            ]
        ];
    }
}
