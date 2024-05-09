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
        Schema::create('residents', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('firstname');
            $table->string('middletname')->nullable();
            $table->string('lastname');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('gender');
            $table->string('bdate');
            $table->string('password');
            $table->boolean('is_activated')->default(0);
            $table->string('pfp')->default("defaultpfp.png");
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
