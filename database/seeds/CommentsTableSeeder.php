<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('comments')->insert([
            [
                'id'          => 1,
                'user_id'     => 4,
                'question_id' => 1,
                'content'     => 'test',
                'created_at'  => Carbon::create(2019, 2, 6),
            ],
        ]);
    }
}
