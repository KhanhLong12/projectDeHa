<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['name', 'category_id', 'author_id', 'description', 'content', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Model\Author');
    }

    public function images()
    {
        return $this->hasMany('App\Model\Image', 'post_id');
    }

    public function listItems($options){
        if ($options == 'get_all_items') {
            $result = Post::all();
        }
            
    	return $result;
    }

    public function store($attribute){
        $result = Post::create($attribute);
        return $result;
    }
}
