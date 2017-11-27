<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('design_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->timestamps();

            $table->foreign('design_id')
                  ->references('id')
                  ->on('designs');

            $table->foreign('tag_id')
                  ->references('id')
                  ->on('tags');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('design_tag');
    }
}
