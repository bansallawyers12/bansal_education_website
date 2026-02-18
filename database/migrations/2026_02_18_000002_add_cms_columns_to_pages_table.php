<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (! Schema::hasColumn('pages', 'title')) {
                $table->string('title')->after('id');
            }
            if (! Schema::hasColumn('pages', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }
            if (! Schema::hasColumn('pages', 'body')) {
                $table->longText('body')->nullable()->after('slug');
            }
            if (! Schema::hasColumn('pages', 'image')) {
                $table->string('image')->nullable()->after('body');
            }
            if (! Schema::hasColumn('pages', 'is_published')) {
                $table->boolean('is_published')->default(true)->after('image');
            }
            if (! Schema::hasColumn('pages', 'meta')) {
                $table->json('meta')->nullable()->after('is_published');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['title', 'slug', 'body', 'image', 'is_published', 'meta']);
        });
    }
};
