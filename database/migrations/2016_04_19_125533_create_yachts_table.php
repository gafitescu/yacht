<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yachts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');

            $table->enum('status', [
                'SAILING',
                'CHECKING',
                'UPGRADING',
                'UNDER_REPAIR',
            ])->default('SAILING');

            $table->string('name', 100);
            $table->string('registration_code', 50)->unique();
            /**
             * add next_maintenance_date so the company can call in advance to notify the client
             * to bring the ship
             */
            $table->date('next_maintenance_date');
            $table->softDeletes();
            $table->timestamps();

            $table->index('registration_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('yachts');
    }
}
