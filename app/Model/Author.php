<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function posts()
    {
        return $this->hasMany('App\Model\Post','author_id');
    }

    public function listItems($options){
        if ($options == 'get_all_items') {
            $result = Author::all();
        }
            
    	return $result;
    }
}
