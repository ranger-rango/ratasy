<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportsRequest;
use App\Http\Requests\UpdateReportsRequest;
use App\Models\Logging;
use App\Models\Reports;
use Carbon\Carbon;

class ReportsController extends Controller
{
    // public function show()
    // {
    //     $records = session('records', collect());
    //     // return view('repo', compact('records'));

    //     return view('reports.show', compact('records'));
    // }

    public function create()
    {
        // $records = Logging::latest()->paginate(4);
        $records = Logging::all();
        return view('reports.create', compact('records'));
    }

    public function store(Reports $reports)
    {
        $attributes = request()->validate(
            [
                'from' => ['required', 'date'],
                'to' => ['required', 'after_or_equal:from'],
                'category' => ['required']
            ]
        );

        

        $from_date = Carbon::parse($attributes['from'])->startOfDay();
        $to_date = Carbon::parse($attributes['to'])->endOfDay();
        $category = $attributes['category'];

        if ($category == 'all')
        {
            $records = Logging::whereBetween('created_at', [$from_date, $to_date])->get();
        }
        else
        {
            $records = Logging::where('category', $category)->whereBetween('created_at', [$from_date, $to_date])->get();
        }


        return view('reports.create', compact('records'));


        // return redirect()->route('reports.show')->with('records', $records);
    
    }

}
