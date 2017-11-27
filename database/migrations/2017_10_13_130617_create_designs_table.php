<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 120)->nullable();
            $table->string('slug')->nullable();
            $table->integer('categories_id')->unsigned();
            $table->text('description');
            $table->string('zip_link')->nullable();
            $table->string('backlink')->nullable();
            $table->string('featured_thumbnail')->nullable();
            $table->string('regular_thumbnail')->nullable();
            $table->json('preview_img')->nullable();
            $table->string('help_document')->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->string('full_name', 60);
            $table->string('email_address', 60);
            $table->integer('views')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('categories_id')
                  ->references('id')
                  ->on('categories');

            $table->foreign('users_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designs');
    }
}
