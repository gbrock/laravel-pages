<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainTemplateTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_domain_template', function(Blueprint $table)
        {
            $table->increments('id');

            // Domain relation
            $table->integer('domain_id')->unsigned();
            $table->foreign('domain_id')->references('id')->on('page_domains');

            // Domain relation
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')->references('id')->on('page_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_domain_template', function(Blueprint $table)
        {
            $table->dropIfExists();
        });
    }

}
