<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTemplatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_templates', function(Blueprint $table)
		{
            $table->increments('id');

            // The human-friendly name of this template
            $table->string('name', 64)->nullable();

            // What the template creator provided
            $table->longText('body');

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
		Schema::table('page_templates', function(Blueprint $table)
		{
            $table->dropIfExists();
		});
	}

}
