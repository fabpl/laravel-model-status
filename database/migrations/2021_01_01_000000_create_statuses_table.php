<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     *
     */
    public function up(): void
    {
        Schema::create(config('model-status.table_name', 'statuses'), function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('model');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     *
     */
    public function down(): void
    {
        Schema::dropIfExists(config('model-status.table_name', 'statuses'));
    }
}
