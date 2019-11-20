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

    public function fetchAuthUserQuestion($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
    }

    public function fetchQuestion($inputs)
    {
        return $this->filterCategory($inputs)
                    ->filterWord($inputs)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
    }

    public function scopeFilterCategory($query, $inputs)
    {
        if (!empty($inputs['tag_category_id'])) {
            return $query->where('tag_category_id', $inputs);
        }
    }

    public function scopeFilterWord($query, $inputs)
    {
        if (!empty($inputs['search_word'])) {
            return $query->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
    }
}