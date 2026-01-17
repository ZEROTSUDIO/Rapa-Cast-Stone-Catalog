<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->string('subject')->nullable()->after('email');
            $table->enum('status', [
                'new',
                'read',
                'replied',
                'archived'
            ])->default('new')->after('message');
            $table->string('ip_address')->nullable()->after('status');
            $table->string('user_agent')->nullable()->after('ip_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->dropColumn([
                'subject',
                'status',
                'ip_address',
                'user_agent'
            ]);
        });
    }
};
