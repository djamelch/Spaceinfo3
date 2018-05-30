<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');

            $table->boolean('for_group')->default('1');
            $table->boolean('for_section')->nullable($value = true);
            $table->boolean('for_level')->nullable($value = true);

            $table->integer('user_id')->unsigned ();
            $table->foreign('user_id')->references('id')->on ('users'); 
         
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
        Schema::dropIfExists('posts');
    }
}
