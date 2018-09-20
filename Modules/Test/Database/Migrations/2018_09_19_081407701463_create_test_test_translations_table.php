<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTestTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test__test_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('test_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['test_id', 'locale']);
            $table->foreign('test_id')->references('id')->on('test__tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test__test_translations', function (Blueprint $table) {
            $table->dropForeign(['test_id']);
        });
        Schema::dropIfExists('test__test_translations');
    }
}
