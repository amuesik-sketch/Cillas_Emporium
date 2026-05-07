<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('pedicures', 'reference')) {
            Schema::table('pedicures', function (Blueprint $table) {
                $table->uuid('reference')->unique()->after('notes');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pedicures', 'reference')) {
            Schema::table('pedicures', function (Blueprint $table) {
                $table->dropColumn('reference');
            });
        }
    }
};
