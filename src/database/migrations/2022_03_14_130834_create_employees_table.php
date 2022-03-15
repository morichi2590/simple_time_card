<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_last')->nullable();
            $table->string('name_first')->nullable();
            $table->string('kana_last')->nullable();
            $table->string('kana_first')->nullable();
            $table->unsignedTinyInteger('sex')->default(0);
            $table->text('memo')->nullable();
            $table->dateTime('retired_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('employees');
    }
};
