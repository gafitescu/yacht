<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * List all maintenance tasks
         */
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            /**
             * Internal code used by the company
             */
            $table->string('code', 5)->unique();
            $table->enum('status', [
                'CHECKING',
                'UPGRADING',
                'UNDER_REPAIR',
            ])->default('CHECKING'); // use for filter certain tasks based on what's needed

            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->smallInteger('average_duration')->unsigned()->default(8);

            $table->softDeletes();
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
        Schema::drop('tasks');
    }
}
