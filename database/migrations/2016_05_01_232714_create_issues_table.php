<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id', false, true);
            $table->string('issue_id')->index();
            $table->string('title');

            $table->nullableTimestamps();
            $table->softDeletes();

            $table->foreign('creator_id')
                ->references('id')
                ->on('creators')
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
        Schema::drop('issues');
    }
}
