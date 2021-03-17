<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('period_name', 225)
            ->nullable()
            ->comment = 'Period Name';

            $table->integer('shift_id')->unsigned()->nullable(false)
            ->comment = 'Class ID from Class';

            $table->foreign('shift_id')->references('entity_id')->on('shifts')->onDelete('cascade');

            $table->time('start_time')
            ->nullable()
            ->comment = 'Start Time';

            $table->time('end_time')
            ->nullable()
            ->comment = 'End Time';

            $table->integer('duration')->unsigned()->nullable()
            ->comment = 'Period Duration in minute';

            $table->string('remarks', 225)
            ->nullable()
            ->comment = 'Remarks';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
