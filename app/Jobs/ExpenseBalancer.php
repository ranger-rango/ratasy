<?php

namespace App\Jobs;

use App\Models\Logging;
use App\Models\OperatingExpense;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExpenseBalancer implements ShouldQueue
{
    use Queueable, InteractsWithQueue, Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $morning = now()->startOfDay();
        $evening = now()->endOfDay();
        $tomorrow = now()->copy()->addDay()->startOfDay();


        $projected_expenses = OperatingExpense::whereBetween('created_at', [$morning, $evening])->sum('amount'); 
        $actual_expenses = Logging::whereBetween('created_at', [$morning, $evening])->sum('total_price');

        if ($projected_expenses > $actual_expenses)
        {
            $balance = (float) $projected_expenses - (float) $actual_expenses;

            Logging::create(
                [
                    'user_id' => 1,
                    'category' => 'balance',
                    'unit_price' => 1.0,
                    'total_weight' => (- $balance),
                    'total_price' => (- $balance),
                    'created_at' => $evening
                ]
            );

            Logging::create(
                [
                    'user_id' => 0,
                    'category' => 'balance',
                    'unit_price' => 1.0,
                    'total_weight' => ($balance),
                    'total_price' => ($balance),
                    'created_at' => $tomorrow
                ]
            );
        }
        

    }
}
