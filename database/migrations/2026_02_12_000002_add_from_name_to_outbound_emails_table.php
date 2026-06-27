<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('outbound_emails') || Schema::hasColumn('outbound_emails', 'from_name')) {
            return;
        }

        Schema::table('outbound_emails', function (Blueprint $table) {
            $table->string('from_name')->nullable()->after('from_address');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('outbound_emails') && Schema::hasColumn('outbound_emails', 'from_name')) {
            Schema::table('outbound_emails', function (Blueprint $table) {
                $table->dropColumn('from_name');
            });
        }
    }
};
