<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('section_name', 225)
            ->nullable()
            ->comment = 'Section Name';

            $table->integer('class_id')->unsigned()->nullable(false)
            ->comment = 'Class ID from Class';

            $table->foreign('class_id')->references('entity_id')->on('class_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
