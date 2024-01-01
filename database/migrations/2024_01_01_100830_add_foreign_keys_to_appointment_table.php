<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('barber_id', 'fk_appointment_to_barber')->references('id')->on('barber')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_appointment_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'fk_appointment_to_service')->references('id')->on('service')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('fk_appointment_to_barber');
            $table->dropForeign('fk_appointment_to_users');
            $table->dropForeign('fk_appointment_to_service');
        });
    }
}
