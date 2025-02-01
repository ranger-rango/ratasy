<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_ledgers', function (Blueprint $table) {
            $table->id();
            $table->decimal('money_in', $total=10, $places=2);
            $table->decimal('expenses', $total=10, $places=2);
            $table->decimal('balance', $total=10, $places=2);
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_ledgers');
    }
};
