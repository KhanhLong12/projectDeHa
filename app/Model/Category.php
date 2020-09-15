<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id' ,'name', 'parent_id', 'display'];

    public $timestamps = true;

    public function categoryParent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function categoryChildrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getParentCategory()
    {
        return $this->where('parent_category', 0)->get();
    }

    public function search($name)
    {
        return $this->when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(2);
    }

}
