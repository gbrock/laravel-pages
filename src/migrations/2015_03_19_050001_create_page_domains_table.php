<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageDomainsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_domains', function(Blueprint $table)
		{
            $table->increments('id');

            // The human-friendly name of this domain
            $table->string('name', 64);

            // The default meta description used for this domain's pages
            $table->string('default_meta_description', 150)->nullable();

            // The slug with which this domain's pages are prefixed
            $table->string('slug', 64)->nullable()->unique();

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
		Schema::table('page_domains', function(Blueprint $table)
		{
            $table->dropIfExists();
		});
	}

}
