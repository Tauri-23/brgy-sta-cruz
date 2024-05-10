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
        Schema::create('document_type_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_type')->nullable();
            $table->string('requirement');
            $table->timestamps();

            /**
             * Foreign Keys
             */
            $table->foreign('document_type')
                ->references('id')
                ->on('document_types')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_type_requirements');
    }
};
