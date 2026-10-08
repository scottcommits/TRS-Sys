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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('profession');
            $table->string('organization')->nullable();
            $table->string('city');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->text('story');
            $table->string('proof_link')->nullable();
            $table->string('photo');
            $table->enum('status', ['pending', 'approved', 'rejected', 'posted'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
