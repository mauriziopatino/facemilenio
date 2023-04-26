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
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('birthday');
            $table->string('url_photo');
            $table->string('biography');
            $table->string('location');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('notes');
            $table->boolean('is_active')->default(1);
            $table->date('created_by');
            $table->date('updated_by');
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
