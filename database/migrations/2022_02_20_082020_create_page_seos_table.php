<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_seos', function (Blueprint $table) {
            $table->string('page_name')->unique();
            $table->string('title');
            $table->string('sub-title');
            $table->string('separator');
            $table->string('slug');
            $table->string('meta-description');
            $table->string('Canonical-Url') ->nullable();
            $table->longText('Schema') -> nullable();
            $table->integer('posted_by') ->default(1);
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
        Schema::dropIfExists('page_seos');
    }
}
