<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedicures', function (Blueprint $table) {
            if (!Schema::hasColumn('pedicures', 'reference')) {
                $table->uuid('reference')->unique()->after('notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pedicures', function (Blueprint $table) {
            if (Schema::hasColumn('pedicures', 'reference')) {
                $table->dropColumn('reference');
            }
        });
    }
};
