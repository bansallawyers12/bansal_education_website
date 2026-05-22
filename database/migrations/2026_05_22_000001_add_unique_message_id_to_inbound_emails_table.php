<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $duplicateMessageIds = DB::table('inbound_emails')
            ->whereNotNull('message_id')
            ->select('message_id')
            ->groupBy('message_id')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('message_id');

        foreach ($duplicateMessageIds as $messageId) {
            $keepId = DB::table('inbound_emails')
                ->where('message_id', $messageId)
                ->min('id');

            DB::table('inbound_emails')
                ->where('message_id', $messageId)
                ->where('id', '!=', $keepId)
                ->delete();
        }

        Schema::table('inbound_emails', function (Blueprint $table) {
            $table->dropIndex(['message_id']);
            $table->unique('message_id');
        });
    }

    public function down(): void
    {
        Schema::table('inbound_emails', function (Blueprint $table) {
            $table->dropUnique(['message_id']);
            $table->index('message_id');
        });
    }
};
