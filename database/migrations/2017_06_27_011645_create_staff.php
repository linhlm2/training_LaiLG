<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff',function(Blueprint $table)
                {
                $table->increments('id');
                $table->string('name',30);
                $table->date('birthday')->nullable();
                $table->string('address',80)->nullable();
                $table->string('country',20)->nullable();
                $table->integer('sex')->nullable();
                $table->string('phone',20)->nullable();
                $table->integer('id_department')->unsigned()->nullable();
                $table->integer('id_position')->unsigned()->nullable();
                $table->string('password',80);
                $table->string('email',30)->unique();
                $table->integer('is_admin');
                $table->integer('active')->default(0);
                $table->string('codepass',20)->nullable();
                $table->timestamps();	
                //$table->foreign('ma_phongban')->references('id_pb')->on('phongban');
                //$table->foreign('ma_chucvu')->references('id_cv')->on('chucvu');
                });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff');
    }
}
