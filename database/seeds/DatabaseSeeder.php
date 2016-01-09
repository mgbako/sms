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

    //factory(Admin::class, 2)->create();

       // Model::reguard();

        //$this->call('QuestionTableSeeder');

        factory('Scholr\Student', 20)->create(); 
    }


}
