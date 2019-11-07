<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Services\SearchingScope;

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

    public function fetchQuestion($userId, $serchWord)
    {
        if(empty($serchWord))
        {   
            return $this->where('user_id', $userId)->get();
        }else
        {
            // return $this->where('title', 'LIKE','%' . $serchWord['search_word'] . '%')
            //             ->orWhere('tag_category_id', '=', $serchWord['tag_category_id'])
            //             ->get();
        }
    }
}
