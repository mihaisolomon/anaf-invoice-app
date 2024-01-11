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
        Schema::create('anaf_tokens', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('anaf_application_id');
            $table->unsignedBigInteger('user_id');

            $table->mediumText('metadata');

            $table->timestamp('expires_in');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('anaf_application_id')
                ->references('id')
                ->on('anaf_applications');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaf_tokens');
    }
};
