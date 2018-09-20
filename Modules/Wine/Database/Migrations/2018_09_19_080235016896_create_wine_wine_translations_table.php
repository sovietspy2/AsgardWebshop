<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWineWineTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wine__wine_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('wine_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['wine_id', 'locale']);
            $table->foreign('wine_id')->references('id')->on('wine__wines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wine__wine_translations', function (Blueprint $table) {
            $table->dropForeign(['wine_id']);
        });
        Schema::dropIfExists('wine__wine_translations');
    }
}
