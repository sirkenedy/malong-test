<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->string('job_title');
            $table->string('job_description');
            $table->foreignId('type_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('condition_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('category_id')->constrained()->nullable()->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
