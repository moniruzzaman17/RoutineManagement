<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('subject_code', 225)
            ->nullable()
            ->comment = 'Subject Code';

            $table->string('subject_name', 225)
            ->nullable()
            ->comment = 'Subject Name';

            $table->string('subject_description', 225)
            ->nullable()
            ->comment = 'Subject Description';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
