<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hostname');
            $table->string('ipaddress');
            $table->string('systemuptime');
            $table->string('memtotal');
            $table->string('memfree');
            $table->string('loadaverage');
            $table->string('disktotal');
            $table->string('diskused');
            $table->string('http');
            $table->string('mysql');
            $table->string('http_est');
            $table->string('eth0_tx');
            $table->string('eth0_rx');
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
        Schema::dropIfExists('monitors');
    }
}
