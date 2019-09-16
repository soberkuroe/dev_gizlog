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

    public function getReportList($request)
    {
        return $this->when($request, function ($query, $request)
        {
            return $this->where('reporting_time', 'LIKE', $request . '%')->where('user_id', Auth::id());
        }, function($query){
            return $this->where('user_id', Auth::id());
        })
        ->orderBy('reporting_time', 'desc')->get();
    }

}
