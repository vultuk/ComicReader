<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('feed_url')->nullable();
            $table->string('logo')->nullable();

            $table->nullableTimestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('creators');
    }
}
