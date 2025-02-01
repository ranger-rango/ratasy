<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyLedgerRequest;
use App\Http\Requests\UpdateDailyLedgerRequest;
use App\Models\DailyLedger;
use Attribute;

class DailyLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $records = DailyLedger::all();
        return view('dailyledger.create', compact('records'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate(
            [
                'from' => ['required', 'date'],
                'to' => ['required', 'after_or_equal:from']
            ]
        );

        $from = $attributes['from'];
        $to = $attributes['to'];

        $records = DailyLedger::whereBetween('date', [$from, $to])->get();

        return view('dailyledger.create', compact('records'));

    }

    /**
     * Display the specified resource.
     */
    public function show(DailyLedger $dailyLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyLedger $dailyLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyLedgerRequest $request, DailyLedger $dailyLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyLedger $dailyLedger)
    {
        //
    }
}
