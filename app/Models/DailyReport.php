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

}
