<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('contact_submissions')) {
            Schema::create('contact_submissions', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('subject')->nullable();
                $table->text('message');
                $table->boolean('is_read')->default(false);
                $table->timestamps();
            });

            return;
        }

        if (Schema::hasColumn('contact_submissions', 'full_name')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                if (! Schema::hasColumn('contact_submissions', 'first_name')) {
                    $table->string('first_name')->default('')->after('id');
                }
                if (! Schema::hasColumn('contact_submissions', 'last_name')) {
                    $table->string('last_name')->default('')->after('first_name');
                }
            });

            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->dropColumn('full_name');
            });
        }

        Schema::table('contact_submissions', function (Blueprint $table) {
            if (! Schema::hasColumn('contact_submissions', 'first_name')) {
                $table->string('first_name')->after('id');
            }
            if (! Schema::hasColumn('contact_submissions', 'last_name')) {
                $table->string('last_name')->after('first_name');
            }
        });
    }

    public function down(): void
    {
        // Intentionally left empty to avoid destructive rollbacks on legacy data.
    }
};
