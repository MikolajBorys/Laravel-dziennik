<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            // dane firmy
            $table->string('company_name');
            $table->string('nip', 20)->nullable();
            $table->string('street');
            $table->string('street_number', 50);
            $table->string('postal_code', 20);
            $table->string('city', 150);
            $table->string('country', 150)->default('Polska');

            // opiekun praktyk w firmie
            $table->string('supervisor_name');
            $table->string('supervisor_role', 150)->nullable();
            $table->string('supervisor_phone', 50)->nullable();
            $table->string('supervisor_email')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
