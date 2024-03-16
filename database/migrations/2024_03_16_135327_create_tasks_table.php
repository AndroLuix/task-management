

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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('projec_manager');
            $table->unsignedBigInteger('id_project');
            $table->string('title');
            $table->string('description');
            $table->foreign('employee_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('projec_manager')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('id_project')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
