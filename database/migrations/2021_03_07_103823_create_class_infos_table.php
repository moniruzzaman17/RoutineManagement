<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_infos', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('class_name', 225)
            ->nullable()
            ->comment = 'Class Name';

            $table->integer('class_num')->unsigned()->nullable()
            ->comment = 'Class in number';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_infos');
    }
}
