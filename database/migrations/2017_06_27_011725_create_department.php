<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('phongban', function (Blueprint $table)
                {
                $table->increments('id_pb');
                $table->string('ten_phongban',50)->unique();
                $table->string('diachipb',80);
                $table->string('sdtpb',20);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('phongban');
    }
}
