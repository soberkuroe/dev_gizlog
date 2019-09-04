<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DailyReport extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'contents',
    ];

    protected $dates = [
        'reporting_time'
    ];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
    
    public function getByMonth($request,$id)
    {
        $reports = $this->where('reporting_time', 'LIKE', "%{$request}%")->where('user_id', $id)->get();

        return $reports;
    }

}
