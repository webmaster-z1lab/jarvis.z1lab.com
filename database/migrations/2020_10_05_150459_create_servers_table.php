<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type')->default('t3');
            $table->string('ip')->nullable();
            $table->string('user')->default('ubuntu');
            $table->string('os')->default('ubuntu server');
            $table->string('password')->nullable();
            $table->string('region')->default('us-east-1');
            $table->string('ssh_key')->nullable();
            $table->integer('port')->default(22);
            $table->boolean('is_active')->default(TRUE);
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
        Schema::dropIfExists('servers');
    }
}
