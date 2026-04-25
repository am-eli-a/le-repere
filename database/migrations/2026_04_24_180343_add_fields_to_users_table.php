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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'age')) {
                $table->integer('age')->nullable();
            }
            if (!Schema::hasColumn('users', 'lieu')) {
                $table->string('lieu')->nullable();
            }
            if (!Schema::hasColumn('users', 'lien_demo')) {
                $table->string('lien_demo')->nullable();
            }
            if (!Schema::hasColumn('users', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('users', 'insta')) {
                $table->string('insta')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
