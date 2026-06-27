<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('pages') || Schema::hasColumn('pages', 'content')) {
            return;
        }

        Schema::table('pages', function (Blueprint $table) {
            $table->longText('content')->nullable()->after('body');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('pages') && Schema::hasColumn('pages', 'content')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('content');
            });
        }
    }
};
