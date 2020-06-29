<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'rooms',
            function (Blueprint $table) {
                $table->id();
                $table->enum('type', ['superior', 'executive', 'apartament']);
                $table->string('number', 10);
                $table->enum('floor', ['2', '3', '4']);
                $table->decimal('price_default', 12, 2);
                $table->softDeletes();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
