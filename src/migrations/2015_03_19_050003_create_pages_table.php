<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

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

            // Domain relation
            $table->integer('domain_id')->unsigned();
            $table->foreign('domain_id')->references('id')->on('page_domains');

            // URL
            $table->string('slug', 255)->nullable();

            // Title
            $table->string('title', 128)->nullable(); // but you should try to keep this under 55 http://moz.com/learn/seo/title-tag

            // <meta> description
            $table->string('meta_description', 150)->nullable();

            // Template relation
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('page_templates');

            // The JSON-encoded chunks of HTML content
            $table->longText('content');

            // Whether or not this is published, and when
            $table->dateTime('publish_at')->nullable();

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
		Schema::table('pages', function(Blueprint $table)
		{
            $table->dropIfExists();
		});
	}

}
