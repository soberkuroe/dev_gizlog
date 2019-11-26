<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SoftDeletes;

    const PER_PAGE = 10;

    protected $fillable = [
        'user_id',
        'tag_category_id',
        'title',
        'content'
    ];

    public function tagCategory()
    {
        return $this->belongsTo('App\Models\TagCategory');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function fetchUserQuestions($userId)
    {
        return $this->where('user_id', $userId)
                    ->with(['comments', 'tagCategory'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PER_PAGE);
    }

    public function fetchQuestions($inputs)
    {
        return $this->filterCategory($inputs)
                    ->filtertitle($inputs)
                    ->with(['comments', 'tagCategory', 'user'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(self::PER_PAGE);
    }

    public function scopeFilterCategory($query, $inputs)
    {
        if (!empty($inputs['tag_category_id'])) {
            return $query->where('tag_category_id', $inputs['tag_category_id']);
        }
    }

    public function scopeFilterTitle($query, $inputs)
    {
        if (!empty($inputs['search_word'])) {
            return $query->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
    }
}