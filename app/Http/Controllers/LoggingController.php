<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoggingRequest;
use App\Http\Requests\UpdateLoggingRequest;
use App\Models\DailyLedger;
use App\Models\Logging;
use App\Models\OperatingExpense;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoggingController extends Controller
{

    public function create()
    {
        return view('logs.create');
    }

    public function store()
    {
        request()->validate(
            [
                'category' => ['required'],
                'unit_price' => ['required'],
                'total_weight' => ['required']
            ]
        );
        $date = today();
        $yesterday = today()->subDay();
        $morning = now()->startOfDay();
        $time_now = now();
        // $operational_funds = OperatingExpense::whereBetween('created_at', [$morning, $time_now])->sum('amount');
        $operational_funds = DailyLedger::where('date', $date)->sum('money_in') + DailyLedger::where('date', $yesterday)->sum('balance');
        $spent = Logging::whereBetween('created_at', [$morning, $time_now])->sum('total_price');
        $availale_funds = (float) $operational_funds - (float) $spent;

        $total_price = (float) request()->input('unit_price') * (float) request()->input('total_weight');

        if ($availale_funds >= $total_price)
        {

            $deficit_warning = null;
        }
        else
        {
            $deficit_warning = "Warning: Operating on deficit.";
        }

        Logging::create(
            [
                'user_id' => Auth::id(),
                'category' => request('category'),
                'unit_price' => request('unit_price'),
                'total_weight' => request('total_weight'),
                'total_price' => $total_price
            ]
        );

        // Create/Update the Ledger
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



        return redirect('/logs')->withErrors(['deficit_warning' => $deficit_warning]);

    }

}
