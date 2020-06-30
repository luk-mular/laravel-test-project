<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'reservations',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('room_id')
                    ->nullable();
                $table->date('from');
                $table->date('to');
                $table->tinyInteger('adults_amount');
                $table->tinyInteger('children_amount')->default(0);
                $table->tinyInteger('infants_amount')->default(0);
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('email', 100)
                    ->nullable();
                $table->string('phone', 30)
                    ->nullable();
                $table->text('notes')
                    ->nullable();
                $table->enum(
                    'status',
                    ['pending', '​confirmed​', '​cancelled​', '​completed​', '​overdue']
                )
                    ->default('pending');
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('room_id')
                    ->references('id')
                    ->on('rooms')
                    ->onDelete('set null')
                ;
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
        Schema::dropIfExists('reservations');
    }
}
