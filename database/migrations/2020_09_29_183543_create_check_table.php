<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckTable extends Migration
{
    public function up(): void
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

    public function down(): void
    {
        Schema::dropIfExists('status');
    }
}
