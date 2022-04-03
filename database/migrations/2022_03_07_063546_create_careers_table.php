<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('vacancy');
            $table->string('job_responsibilities');
            $table->string('employment_status');
            $table->string('workplace');
            $table->string('educational_requirements');
            $table->string('experience_requirements');
            $table->string('additional_requirements');
            $table->string('job_location');
            $table->string('salary');
            $table->string('deadline');
              $table->integer('category')->nullable();
            $table->string('image');
            $table->string('alt_tag');
            $table->string('compensation_other_benefits');
            $table->timestamp('publised_at');
              $table->enum('status',['1','0'])->default('1');
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
        Schema::dropIfExists('careers');
    }
}
