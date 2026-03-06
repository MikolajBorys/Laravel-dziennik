<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table){
            $table->id();
            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();
            $table->string('school_name');
            $table->string('street');
            $table->string('street_number', 50);
            $table->string('postal_code', 20);
            $table->string('city', 150);
            $table->string('country', 150)->default('Polska');

            $table->string('class_name', 100);

            $table->string('supervisor_name');
            $table->string('supervisor_phone', 50)->nullable();
            $table->string('supervisor_email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
