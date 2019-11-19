<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $table = 'tag_categories';
    protected $dates = ['deleted_at'];

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function fetchCategory($fetchID)
    {
        return $this->where('id', $fetchID['tag_category_id'])->get();
    }

    public function fetchAllCategories()
    {
        return $this->all()->pluck('name', 'id');
    }
}

