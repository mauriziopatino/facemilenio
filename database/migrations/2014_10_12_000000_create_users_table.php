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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('gender_id');
            $table->foreignId('role_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthdate');
            $table->string('url_photo')->nullable();
            $table->string('biography')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('notes')->nullable();
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
