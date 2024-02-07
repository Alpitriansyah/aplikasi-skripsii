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

        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->string('jurusan')->after('password');
        });

        Schema::table('dosens', function (Blueprint $table) {
            $table->string('jurusan')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->dropColumn('jurusan');
        });
        Schema::table('dosens', function (Blueprint $table) {
            $table->dropColumn('jurusan');
        });
    }
};
