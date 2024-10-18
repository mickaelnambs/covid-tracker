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
        Schema::create('covid_data', function (Blueprint $table) {
            $table->id();
            $table->string('country')->unique();
            $table->integer('cases')->default(0);
            $table->integer('deaths')->default(0);
            $table->integer('recovered')->default(0);
            $table->integer('active')->default(0);
            $table->integer('critical')->default(0);
            $table->float('cases_per_million')->default(0);
            $table->float('deaths_per_million')->default(0);
            $table->bigInteger('tests')->default(0);
            $table->float('tests_per_million')->default(0);
            $table->bigInteger('population')->default(0);
            $table->string('continent')->nullable();
            $table->string('country_iso2', 2)->default('XX');
            $table->string('country_flag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covid_data');
    }
};
