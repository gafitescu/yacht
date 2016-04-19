<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('yacht_id')->unsigned();
            $table->foreign('yacht_id')
                ->references('id')->on('yachts')
                ->onDelete('cascade');

            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')
                ->references('id')->on('tasks')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('history');
    }
}
