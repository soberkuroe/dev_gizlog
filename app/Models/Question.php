<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'content'
    ];

    protected $with =[
        'comments',
        'tagCategory'
    ];

    public function tagCategory()
    {
        return $this->belongsTo('App\Models\TagCategory');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }


    public function fetchQuestion($userId, $inputs)
    {
        if (empty($inputs)) {
            return $this->fetchUserQuestion($userId);
        } else {
            return $this->filterUser($userId)
                ->filterCategory($inputs)
                ->filterWord($inputs)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
    }

    public function scopeFetchUserQuestion($query, $userId)
    {
        return $query->filterUser($userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function scopeFilterUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeFilterCategory($query, $inputs)
    {
        if (!empty($inputs['tag_category_id'])) {
            return $query->where('tag_category_id', $inputs);
        }
        return $query;
    }

    public function scopeFilterWord($query, $inputs)
    {
        if (!empty($inputs['search_word'])) {
            $query->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
        return $query;
    }
}