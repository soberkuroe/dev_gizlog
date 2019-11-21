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

    public function confirmCategory($id)
    {
        return $this->find($id['tag_category_id']);
    }

    public function fetchAllCategories()
    {
        return $this->all()->pluck('name', 'id');
    }

    public function fetchFormCategories()
    {
        return $this->all()
                    ->pluck('name', 'id')
                    ->prepend('Select category', '');
    }
}

