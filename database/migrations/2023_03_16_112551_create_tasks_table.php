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
        Schema::connection('mysql')->create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('status');
            $table->integer('admin_id');
            $table->integer('user_id');
            $table->integer('rating') ->nullable();
            $table->string('answer') ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tasks');

    }
};
