<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('student_id')->unsigned()->nullable()->unique();
            $table->integer('staff_id')->unsigned()->nullable()->unique();
            $table->integer('teacher_id')->unsigned()->nullable()->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('type');
            $table->string('slug');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            $table->foreign('staff_id')
                ->references('id')
                ->on('staffs')
                ->onDelete('cascade');

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('users');
    }
}
