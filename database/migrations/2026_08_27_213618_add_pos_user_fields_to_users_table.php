<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('id');
            $table->string('middlename')->nullable()->after('firstname');
            $table->string('lastname')->after('middlename');
            $table->enum('gender', ['Male', 'Female', 'Other'])
                ->after('lastname');
            $table->string('username')->unique()->after('gender');
            $table->string('user_image')->nullable()->after('password');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['username']);

            $table->dropColumn([
                'firstname',
                'middlename',
                'lastname',
                'gender',
                'username',
                'user_image',
            ]);
        });
    }
};