<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


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

    public function getReportList($inputs, $userId)
    {
        return $this->where('user_id', $userId)
            ->when($inputs, function ($query, $inputs) {
                return $query->where('reporting_time', 'LIKE', $inputs['search-month'] . '%');
            })
            ->orderBy('reporting_time', 'desc')
            ->get();
    }

}
