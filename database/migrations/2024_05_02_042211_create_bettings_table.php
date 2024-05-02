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
        Schema::create('bettings', function (Blueprint $table) {
            $table->id();
            $table->string('accountt_id');
            $table->string('ticket_number');
            $table->string('time');
            $table->date('date');
            $table->integer('fighting_number');
            $table->string('bit_type');
            $table->double('amount', 10, 2);
            $table->decimal('rate', 4, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bettings');
    }
};
