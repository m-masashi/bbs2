<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50);
            $table->text('body')->nullable();
            $table->integer('cat1')->nullable();
            $table->integer('cat2')->nullable();
            $table->string('ip', 20)->nullable();
            $table->integer('flag')->nullable();
            $table->string('position01', 10)->nullable();
            $table->string('position02', 10)->nullable();
            $table->string('position03', 10)->nullable();
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
        Schema::dropIfExists('threads');
    }
}
