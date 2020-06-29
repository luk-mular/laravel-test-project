<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGuests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'guests',
            function (Blueprint $table) {
                $table->id();
                $table->string('id_number', 30)->unique();
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('email', 100)
                    ->nullable();
                $table->string('phone', 30)
                    ->nullable();
                $table->string('city');
                $table->string('country', 2)->default('PL');
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
        Schema::dropIfExists('guests');
    }
}
