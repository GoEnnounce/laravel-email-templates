<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class EmailTemplateTables
 */
class EmailTemplateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_layouts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->text('layout');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('email_templates', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('owner_id')->unsigned()->nullable();
            $table->bigInteger('layout_id')->unsigned()->nullable();
            $table->string('handle', 128);
            $table->string('subject', 128);
            $table->text('content');
            $table->string('language', 4)->default('en');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('email_templates', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('layout_id')->references('id')->on('email_layouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_templates');
        Schema::dropIfExists('email_layouts');
    }
}
