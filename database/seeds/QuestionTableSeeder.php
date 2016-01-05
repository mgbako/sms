<?php

use Illuminate\Database\Seeder;

use Scholr\Teacher;
use Scholr\Student;
use Scholr\User;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory('Scholr\Question', 100)->create();
        
    }
}
