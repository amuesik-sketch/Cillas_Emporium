<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn(['third', 'fourth']); // delete these columns
        });
    }

    public function down(): void
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->string('third')->nullable()->after('second');
            $table->string('fourth')->nullable()->after('third');
        });
    }
};
