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
            $table->string('loginId')->unique();
            $table->string('username')->unique();
            $table->integer('student_id')->unsigned()->nullable()->unique();
            $table->integer('teacher_id')->unsigned()->nullable()->unique();
            $table->integer('admin_id')->unsigned()->nullable()->unique();
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

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');

            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
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
