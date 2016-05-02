<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_id', false, true);
            $table->string('title');
            $table->string('image_url')->nullable();

            $table->nullableTimestamps();
            $table->softDeletes();

            $table->foreign('issue_id')
                ->references('id')
                ->on('issues')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
