<?php

use Illuminate\Database\Seeder;

class DailyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->insert([
            [
                'user_id'        => 2,
                'title'          => 'タイトルテスト',
                'contents'        => '日報の内容テスト',
                'reporting_time' => '2019-8-23',
                'created_at'     => '2019-8-23',
            ],
            [
                'user_id'        => 2,
                'title'          => 'タイトルテスト',
                'contents'        => '日報の内容テスト',
                'reporting_time' => '2019-9-23',
                'created_at'     => '2019-9-23',
            ],
            [
                'user_id'        => 2,
                'title'          => 'タイトルテスト',
                'contents'        => '日報の内容テスト',
                'reporting_time' => '2019-10-23',
                'created_at'     => '2019-10-23',
            ],
        ]);
    }
}
