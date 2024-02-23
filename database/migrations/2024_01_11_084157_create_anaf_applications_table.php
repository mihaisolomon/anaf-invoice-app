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
        Schema::create('anaf_applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('team_id');

            $table->string('client_id');
            $table->string('client_secret');
            $table->string('redirect_uri');
            $table->boolean('is_active');

            $table->foreign('team_id')
                ->references('id')
                ->on('teams');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaf_applications');
    }
};
