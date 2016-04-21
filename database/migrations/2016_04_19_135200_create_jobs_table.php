<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->integer('yacht_id')->unsigned();
            $table->foreign('yacht_id')
                ->references('id')->on('yachts')
                ->onDelete('cascade');

            $table->enum('status', [
                'NEW',
                'IN_PROGRESS',
                'COMPLETED',
            ])->default('NEW');

            $table->string('client_notes', 255);
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
        Schema::drop('jobs');
    }
}
