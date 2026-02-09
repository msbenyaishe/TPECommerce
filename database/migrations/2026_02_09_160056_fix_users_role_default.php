<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Change default from USER → user
        DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) DEFAULT 'user'");
    }

    public function down(): void
    {
        // Rollback if needed
        DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) DEFAULT 'USER'");
    }
};
