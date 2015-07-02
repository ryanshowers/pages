<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('pages', function(Blueprint $table)
        {
			$table->increments('id');
			$table->string('title');
			$table->string('slug')->unique();
			$table->string('meta_title', 100);
			$table->string('meta_keywords');
			$table->text('meta_description');
			$table->text('content');
			$table->string('image');
			$table->text('attributes');
			$table->string('view')->nullable();
			$table->integer('sort')->default(0);
			$table->timestamps();
			$table->timestamp('publish_at')->nullable();
			$table->timestamp('unpublish_at')->nullable();
			$table->softDeletes();
		});   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages');
    }
}
