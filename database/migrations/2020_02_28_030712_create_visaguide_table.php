<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaguideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visaguide', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('short_description')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('purpose_id')->nullable();
            $table->longText('detailed_description')->nullable();
            $table->string('success_rate')->nullable();
            $table->boolean('can_apply_online')->nullable();
            $table->string('apply_online_link_id')->nullable();
            $table->string('instructions')->nullable();
            $table->boolean('active')->nullable();
            $table->string('order')->nullable();
            $table->boolean('is_evisa')->nullable();
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
        Schema::dropIfExists('visaguide');
    }
}
