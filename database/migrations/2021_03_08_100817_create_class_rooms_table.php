<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('room_no', 225)
            ->nullable()
            ->comment = 'Room Number';

            $table->string('floor', 225)
            ->nullable()
            ->comment = 'Floor';

            $table->string('building', 225)
            ->nullable()
            ->comment = 'Building';

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
        Schema::dropIfExists('class_rooms');
    }
}
