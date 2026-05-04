<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->string('first');           // product name/title
            $table->decimal('second', 8, 2);   // product price
            $table->tinyInteger('rating')->default(0)->unsigned();      
            $table->integer('reviews_count')->default(0)->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
