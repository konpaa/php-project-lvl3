<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains_checks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('domain_id');
            $table->foreign('domain_id')->references('id')->on('domains');
            $table->integer('status_code')->nullable();
            $table->string('h1')->nullable();
            $table->string('keywords')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('domains_checks');
    }
}
