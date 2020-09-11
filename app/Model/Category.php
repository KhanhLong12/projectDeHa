<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'parent_category', 'display'];

    public $timestamps = true;

    public function categoryParent()
    {
        return $this->belongsTo(Category::class, 'parent_category');
    }

    public function categoryChildrens()
    {
        return $this->hasMany(Category::class, 'parent_category');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getParentCategory()
    {
        $result = $this->where('parent_category', '=', 'danh muc cha')->get('name');
        return $result;
    }

    public function search($input)
    {
        return $this->when($input, function ($query) use ($input) {
            return $query->where('name', 'like', '%' . $input . '%');
        })->paginate(2);
    }

}
