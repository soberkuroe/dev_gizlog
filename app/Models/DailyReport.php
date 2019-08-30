<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DailyReport extends Model
{
    use SoftDeletes;
    
    protected $table = 'daily_reports';

    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'contents',
    ];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
    
    public function getMonth($request)
    {
        $reports = $this->where('reporting_time','LIKE',"%{$request}%")->get();

        return $reports;
    }

}
