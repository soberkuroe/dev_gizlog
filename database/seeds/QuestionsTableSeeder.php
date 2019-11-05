<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            [
                'id'              => 1,
                'user_id'         => 4,
                'tag_category_id' => 1,
                'title'           => 'jQueryについての質問',
                'content'         => 'フロントエンドカテゴリ質問のテストです',
                'created_at'      => Carbon::create(2019, 2, 6),
            ],
            [
                'id'              => 2,
                'user_id'         => 4,
                'tag_category_id' => 2,
                'title'           => 'PHPについての質問',
                'content'         => 'バックエンドカテゴリ質問のテストです',
                'created_at'      => Carbon::create(2019, 6, 9),
            ],
            [
                'id'              => 3,
                'user_id'         => 4,
                'tag_category_id' => 3,
                'title'           => 'Rubyについての質問',
                'content'         => 'インフラカテゴリ質問のテストです',
                'created_at'      => Carbon::create(2019, 9, 9),
            ],
            [
                'id'              => 4,
                'user_id'         => 4,
                'tag_category_id' => 4,
                'title'           => 'コード規約についての質問',
                'content'         => 'その他カテゴリ質問のテストです',
                'created_at'      => Carbon::create(2019, 9, 18),
            ],
        ]);
    }
}
