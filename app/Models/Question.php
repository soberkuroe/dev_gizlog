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
        return $this->where('user_id', $userId)
            ->when(!empty($inputs), function ($query) use ($inputs) {
                return $query->fetchSerchingQuestion($inputs);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function scopeFetchSerchingQuestion($query, $inputs)
    {
        if (!empty($inputs['tag_category_id'])) {
            $query->where('tag_category_id', $inputs);
        }
        if (!empty($inputs['search_word'])) {
            $query->where('title', 'like', '%'.$inputs['search_word'].'%');
        }
        return $query;
    }
}
