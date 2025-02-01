<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatingExpenseRequest;
use App\Http\Requests\UpdateOperatingExpenseRequest;
use App\Models\DailyLedger;
use App\Models\Logging;
use App\Models\OperatingExpense;
use Carbon\Carbon;

class OperatingExpenseController extends Controller
{

    public function create()
    {
        $expenses = OperatingExpense::all();
        return view('expenses.create', compact('expenses'));
    
        
    }

    public function store()//StoreOperatingExpenseRequest $request)
    {
       
        $amount = request('amount');
        if ($amount)
        {
            request()->validate(
                [
                    'amount' => ['required']
                ]
            );
    
            OperatingExpense::create(
                [
                    'amount' => request('amount')
                ]
            );

            $date = today();
            $yesterday = today()->subDay();
            $morning = now()->startOfDay();
            $time_now = now();

            $operational_funds = DailyLedger::where('date', $date)->sum('money_in') + DailyLedger::where('date', $yesterday)->sum('balance') + request('amount');

            $money_in = OperatingExpense::whereBetween('created_at', [$morning, $time_now])->sum('amount');
            $expenses = Logging::whereBetween('created_at', [$morning, $time_now])->sum('total_price');
            $balance = $operational_funds - $expenses;
            DailyLedger::updateOrCreate(
                [
                    'date' => $date
                ],
                [
                    'money_in' => $money_in,
                    'expenses' => $expenses,
                    'balance' => $balance
                ]
            );

            return redirect('/expenses');
        }


        $from = request('from');
        $to = request('to');


        if ($from && $to)
        {
            $attributes = request()->validate(
                [
                    'from' => ['required', 'date'],
                    'to' => ['required', 'after_or_equal:from']
                ]
            );

            $from_date = Carbon::parse($attributes['from'])->startOfDay();
            $to_date = Carbon::parse($attributes['to'])->endOfDay();
    
            $expenses = OperatingExpense::whereBetween('created_at', [$from_date, $to_date])->get();

            return view('expenses.create', compact('expenses'));
        }

        
        // return redirect()->route('expenses.create');

    }


}
