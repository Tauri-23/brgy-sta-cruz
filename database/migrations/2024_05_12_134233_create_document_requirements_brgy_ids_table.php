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
        Schema::create('document_requirements_brgy_ids', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('document_request', 6)->nullable();
            $table->unsignedBigInteger('document_requirement_for')->nullable();
            $table->string('filename');
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Foreign Keys
             */
            $table->foreign('document_request')
                ->references('id')
                ->on('document_request_brgy_ids')
                ->nullOnDelete()
                ->cascadeOnUpdate();
                
            $table->foreign('document_requirement_for')
                ->references('id')
                ->on('document_type_requirements')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_requirements_brgy_ids');
    }
};
