<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('inbound_emails') && ! Schema::hasColumn('inbound_emails', 'deleted_at')) {
            Schema::table('inbound_emails', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (Schema::hasTable('outbound_emails') && ! Schema::hasColumn('outbound_emails', 'deleted_at')) {
            Schema::table('outbound_emails', function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('inbound_emails') && Schema::hasColumn('inbound_emails', 'deleted_at')) {
            Schema::table('inbound_emails', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }

        if (Schema::hasTable('outbound_emails') && Schema::hasColumn('outbound_emails', 'deleted_at')) {
            Schema::table('outbound_emails', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
};
