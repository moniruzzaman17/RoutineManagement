<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('entity_id');

            $table->string('teacher_name', 225)
            ->nullable()
            ->comment = 'Teacher Name';

            $table->string('name_code', 225)
            ->nullable()
            ->comment = 'Short Name Code';

            $table->string('designation', 225)
            ->nullable()
            ->comment = 'Teacher Designation';

            $table->string('contact_number', 225)
            ->nullable()
            ->comment = 'Contact Number';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
