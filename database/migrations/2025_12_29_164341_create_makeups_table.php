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
       Schema::create('makeups', function (Blueprint $table) {
    $table->id();
    $table->uuid('reference')->unique();

    $table->string('name');
    $table->string('phone');
    $table->string('email')->nullable();
    $table->string('location');

    $table->string('makeup_type');
    $table->string('event_type')->nullable();
    $table->date('event_date');
    $table->time('event_time');
    $table->integer('faces')->default(1);

    $table->string('style_image')->nullable();
    $table->text('notes')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makeups');
    }
};
