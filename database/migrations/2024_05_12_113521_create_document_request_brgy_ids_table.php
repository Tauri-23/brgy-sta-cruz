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
        Schema::create('document_request_brgy_ids', function (Blueprint $table) {
            $table->string('id', 6)->primary();
            $table->string('resident', 6)->nullable();
            $table->unsignedBigInteger('document_type')->nullable();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->date('bdate');
            $table->string('tin')->nullable();
            $table->string('sss')->nullable();
            $table->string('bdate_place');
            $table->string('blood_type')->nullable();
            $table->string('reason')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->string('status');
            $table->string('reference_num')->nullable();
            $table->timestamp('created_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            /**
             * Foreign Keys
             */
            $table->foreign('resident')
                ->references('id')
                ->on('residents')
                ->nullOnDelete()
                ->cascadeOnUpdate();

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
        Schema::dropIfExists('document_request_brgy_ids');
    }
};
