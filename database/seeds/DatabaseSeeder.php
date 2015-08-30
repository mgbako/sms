<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Scholr\Student;
use Scholr\User;
use Scholr\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //factory(User::class)->create();
    factory(Teacher::class, 4)->create();

        Model::reguard();
    }
}
