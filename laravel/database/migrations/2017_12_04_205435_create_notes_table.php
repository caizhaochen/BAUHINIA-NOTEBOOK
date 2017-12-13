<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    protected $primary='note_id';

    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('note_id');
            $table->integer('notebook_id');
            $table->string('title');
            $table->string('tag');
            $table->text('body');
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
        Schema::dropIfExists('notes');
    }
}
