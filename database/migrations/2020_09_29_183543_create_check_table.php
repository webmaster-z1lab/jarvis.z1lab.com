<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('host_id')->nullable();
            $table->uuid('incident_id')->nullable();
            $table->string('status')->default(\App\Models\CheckStatus::NOT_CHECKED);
            $table->integer('code')->nullable();
            $table->float('latency')->nullable();
            $table->string('message')->nullable();
            $table->json('output')->nullable();
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
        Schema::dropIfExists('status');
    }
}
