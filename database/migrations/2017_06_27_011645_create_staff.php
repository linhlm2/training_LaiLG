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
        Schema::create('nhanvien',function(Blueprint $table)
                {
                $table->increments('id_nv');
                $table->string('hoten',30);
                $table->time('ngaysinh');
                $table->string('quequan',80)->nullable();
                $table->string('dantoc',20)->nullable();
                $table->integer('gioitinh')->nullable();
                $table->string('sdt',20)->nullable();
                $table->integer('ma_phongban')->unsigned();
                $table->integer('ma_chucvu')->unsigned();
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
        Schema::drop('nhanvien');
    }
}
