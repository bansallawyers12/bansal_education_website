<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('email_templates');
        Schema::dropIfExists('outbound_emails');
        Schema::dropIfExists('inbound_emails');
    }

    public function down(): void
    {
        // Tables are recreated by earlier migrations if rolled back.
    }
};
