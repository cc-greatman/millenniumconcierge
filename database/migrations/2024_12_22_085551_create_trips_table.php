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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['private', 'commercial', 'yacht', 'helicopter']);
            $table->string('airline');
            $table->string('ticket_type');
            $table->string('departure_date');
            $table->string('arrival_date');
            $table->string('baggage_allowance');
            $table->decimal('cost', 50, 2)->default(0.00);
            $table->string('departure');
            $table->string('destination');
            $table->string('seats')->default(1);
            $table->enum('status', ['used', 'unused']);
            $table->longText('extra_comments')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
